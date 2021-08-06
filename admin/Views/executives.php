<?php

    class vExecutive{
        private $executives;
        function __construct()
        {
            // require_once "./core/roles.php";
            require_once "./core/administrators.php";
            $this->executives = new Administrator("../");
        }


        public function fetch_admins($fetch_rule = NULL)
        {
            $executives = $this->executives->records($fetch_rule);
            if($executives !="NO_DATA")
            {
                // return $executives;
                foreach ($executives as $executive) {
                    echo "
                    <tr>
                        <td>{$executive['name']}</td>
                        <td>{$executive['email']}</td>
                        <td>{$executive['phone']}</td>
                        <td>{$this->executives->admin_role($executive['rid'])['name']}</td>
                        <td>
                            <a href='editadmin.php?id={$executive['id']}' class='btn btn-success btn-sm' ><i class='ti-pencil-alt'></i></a>
                            <a href='javascript:;' class='btn btn-sm view_admin_info_btn' data-id='{$executive['id']}'><i class='ti-info-alt'></i></a>
                            <a href='javascript:;' class='btn btn-sm del_admin_info_btn' data-id='{$executive['id']}'><i class='ti-trash'></i></a>
                        </td>
                    </tr>
                    ";
                }
            }
        }

        public function profile_card($id)
        {
            $executive = $this->executives->singlerecord($id);
            echo "
            <div class='col-lg-4 col-md-5 col-sm-12'>
                <div class='profile-bx text-center'>
                    <div class='user-profile-thumb'>
                        <img src='assets/images/testimonials/{$executive['photo']}' alt=''/>
                    </div>
                    <div class='profile-info'>
                        <h4>{$executive['name']}</h4>
                        <div>{$this->executives->admin_role($executive['rid'])['name']}</div>
                        <div>{$executive['email']}</div>
                        <div>{$executive['phone']}</div>
    
                    </div>
                    <div class='profile-social'>
                        <ul class='list-inline m-a0'>
                            <li><a target = '_blank' href='{$executive['facebook']}'><i class='fa fa-facebook'></i></a></li>
                            <li><a target = '_blank' href='{$executive['instagram']}'><i class='fa fa-instagram'></i></a></li>
                            <li><a target = '_blank' href='{$executive['twitter']}'><i class='fa fa-twitter'></i></a></li>
                            <li><a target = '_blank' href='{$executive['linkedin']}'><i class='fa fa-linkedin'></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            ";
        }

        public function admin_data($id)
        {
            return $this->executives->singlerecord($id);
        }
        // public function role($rid)
        // {
        //     return $this->executives->admin_role($rid);
        // }

        // public function roles_list($rid)
        // {
        //     $role = $this->role($rid);
        //     echo "<option value='{$role['id']}' selected data-desc = '{$role['description']}'>{$role['name']}</option>";
        //     $roles = new Roles();
        //     $fetch_rule = "WHERE `id` <> $rid";
        //     $roles = $roles->records($fetch_rule);
        //     if($roles != "NO_DATA")
        //     {
        //         foreach ($roles as $role) {
        //             echo " <option value='{$role['id']}' data-desc = '{$role['description']}'>{$role['name']}</option>";
        //         }
        //     }
        // }
        // public function redirect($url)
        // {
        //     return $this->executives->redirect($url);
        // }
    }


    // $opr = new vAdmins();
    // echo "<pre>";
    // var_dump($opr->fetch_admins());
?>