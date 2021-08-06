<?php

    class vFaculty{
        private $faculty;
        function __construct()
        {
            require_once "./core/department.php";
            $this->faculty = new Department("../");
        }



        public function fetch_faculties($fetch_rule = NULL)
        {
            $faculty = $this->faculty->records($fetch_rule);
            if($faculty !="NO_DATA")
            {
                // return $faculty;
                foreach ($faculty as $faculty) {
                    echo "
                    <tr>
                        <td>{$faculty['name']}</td>
                        <!--<td>{$faculty['address']}</td>-->
                        <td>{$faculty['email']}</td>
                        <td>";
                        if(isset($faculty['facebook'])) echo "<a href='#' class='btn-link'> <i class='fa fa-facebook'></i></a>";
                        if(isset($faculty['instagram'])) echo "<a href='#' class='btn-link'> <i class='fa fa-instagram'></i></a>";
                        if(isset($faculty['telegram'])) echo "<a href='#' class='btn-link'> <i class='fa fa-telegram'></i></a>";
                        echo "</td>
                        <td>
                            <a href='javascript:;' class='btn btn-sm edit_faculty_info_btn' data-id='{$faculty['id']}'><i class='ti-pencil-alt'></i></a>
                            <a href='javascript:;' class='btn btn-sm view_faculty_info_btn' data-id='{$faculty['id']}'><i class='ti-info-alt'></i></a>
                            <a href='javascript:;' class='btn btn-sm del_faculty_info_btn' data-id='{$faculty['id']}'><i class='ti-trash'></i></a>
                        </td>
                    </tr>
                    ";
                }
            }
        }

        public function faculty_data($id)
        {
            return $this->faculty->singlerecord($id);
        }

    }

    // update-event.php?id={$event['id']}
    // $opr = new vAdmins();
    // echo "<pre>";
    // var_dump($opr->fetch_admins());
?>