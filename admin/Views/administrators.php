<?php

    class vAdmins{
        private $admins;
        function __construct()
        {
            require_once "./core/roles.php";
            require_once "./core/administrators.php";
            $this->admins = new Administrator("../");
        }


        public function fetch_admins($fetch_rule = NULL)
        {
            $admins = $this->admins->records($fetch_rule);
            if($admins !="NO_DATA")
            {
                // return $admins;
                foreach ($admins as $admin) {
                    echo "
                    <tr>
                        <td>{$admin['name']}</td>
                        <td>{$admin['email']}</td>
                        <td>{$admin['phone']}</td>
                        <td>{$this->admins->admin_role($admin['rid'])['name']}</td>
                        <td>
                            <a href='javascript:;' class='btn btn-sm edit_admin_info_btn'  data-id='{$admin['id']}'><i class='ti-pencil-alt'></i></a>
                            <a href='javascript:;' class='btn btn-sm view_admin_info_btn' data-id='{$admin['id']}'><i class='ti-info-alt'></i></a>
                            <a href='javascript:;' class='btn btn-sm del_admin_info_btn' data-id='{$admin['id']}'><i class='ti-trash'></i></a>
                        </td>
                    </tr>
                    ";
                }
            }
        }
        public function featured_admins($fetch_rule = NULL)
        {
            $admins = $this->admins->records($fetch_rule);
            if($admins !="NO_DATA")
            {
                // return $admins;
                foreach ($admins as $admin) {
                    echo "
                    <li>
                    <span class='new-users-pic'>
                        <img src='../assets/images/profiles/{$admin['photo']}' alt=''/>
                    </span>
                    <span class='new-users-text'>
                        <a href='#' class='new-users-name'>{$admin['name']} </a>
                        <span class='new-users-info'>{$this->admins->admin_role($admin['rid'])['name']}</span>
                    </span>
                    <span class='new-users-btn'>
                        <a href='#' class='btn button-sm outline'><i class='fa fa-comments-o'></i></a>
                    </span>
                </li>
                    ";
                }
            }
            
        }
        public function profile_card($id)
        {
            $admin = $this->admins->singlerecord($id);
            echo "
            <div class='col-lg-4 col-md-5 col-sm-12'>
                <div class='profile-bx text-center'>
                    <div class='user-profile-thumb'>
                        <img src='../assets/images/profiles/{$admin['photo']}' alt=''/>
                    </div>
                    <div class='profile-info'>
                        <h4>{$admin['name']}</h4>
                        <div>{$this->admins->admin_role($admin['rid'])['name']}</div>
                        <div>{$admin['email']}</div>
                        <div>{$admin['phone']}</div>
    
                    </div>
                    <div class='profile-social'>
                        <ul class='list-inline m-a0'>
                            <li><a target = '_blank' href='{$admin['facebook']}'><i class='fa fa-facebook'></i></a></li>
                            <li><a target = '_blank' href='{$admin['instagram']}'><i class='fa fa-instagram'></i></a></li>
                            <li><a target = '_blank' href='{$admin['twitter']}'><i class='fa fa-twitter'></i></a></li>
                            <li><a target = '_blank' href='{$admin['linkedin']}'><i class='fa fa-linkedin'></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            ";
        }

        public function admin_data($id)
        {
            return $this->admins->singlerecord($id);
        }
        public function role($rid)
        {
            return $this->admins->admin_role($rid);
        }

        public function roles_list($rid)
        {
            $role = $this->role($rid);
            echo "<option value='{$role['id']}' selected data-desc = '{$role['description']}'>{$role['name']}</option>";
            $roles = new Roles();
            $fetch_rule = "WHERE `id` <> $rid";
            $roles = $roles->records($fetch_rule);
            if($roles != "NO_DATA")
            {
                foreach ($roles as $role) {
                    echo " <option value='{$role['id']}' data-desc = '{$role['description']}'>{$role['name']}</option>";
                }
            }
        }
        // public function redirect($url)
        // {
        //     return $this->admins->redirect($url);
        // }
    }


    // $opr = new vAdmins();
    // echo "<pre>";
    // var_dump($opr->fetch_admins());
?>