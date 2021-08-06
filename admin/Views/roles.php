<?php

    class vRoles{
        private $roles;
        function __construct()
        {
            require_once "./core/roles.php";
            $this->roles = new Roles();
        }


        public function fetch_roles($fetch_rule = NULL)
        {
            $roles = $this->roles->records($fetch_rule);
            if($roles !="NO_DATA")
            {
                foreach ($roles as $role) {
                    echo "
                    <tr>
                        <td class = 'text-center'>AR-{$role['id']}</td>
                        <td>{$role['name']}</td>
                        <td>{$this->roles->getFullDate($role['date_added'])}</td>
                        <td>
                            <a href='javascript:;' class='btn btn-sm edit_admin_role_btn' data-id = '{$role['id']}'><i class='ti-pencil-alt'></i></a>
                            <a href='javascript:;' class='btn btn-sm view_admin_role_btn' data-id = '{$role['id']}'><i class='ti-info-alt'></i></a>
                            <a href='javascript:;' class='btn btn-sm'><i class='ti-trash' data-id = '{$role['id']}'></i></a>
                        </td>
                    </tr>
                    ";
                }
            }
        }
    }


    // $opr = new uRoles();
    // echo "<pre>";
    // var_dump($opr->fetch_roles());
?>