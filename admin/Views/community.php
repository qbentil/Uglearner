<?php

    class vCommunity{
        private $communities;
        function __construct()
        {
            require_once "./core/communities.php";
            require_once "./core/department.php";
            $this->communities = new Community("../");
        }



        public function fetch_communities($fetch_rule = NULL)
        {
            $communities = $this->communities->records($fetch_rule);
            if($communities !="NO_DATA")
            {
                // return $communities;
                foreach ($communities as $community) {
                    echo "
                    <tr>
                        <td>{$community['name']}</td>
                        <td>{$community['slug']}</td>
                        <td>{$community['email']}</td>
                        <td>
                            <a target='_blank' href='{$community['facebook']}' class='btn-link'><i class='fa fa-facebook'></i></a>
                            <a target='_blank' href='{$community['twitter']}' class='btn-link'><i class='fa fa-twitter'></i></a>
                            <a target='_blank' href='{$community['instagram']}' class='btn-link'><i class='fa fa-instagram'></i></a>
                        </td>
                        <td>
                            <a href='javascript:;' class='btn btn-sm edit_community_info_btn' data-id='{$community['id']}'><i class='ti-pencil-alt'></i></a>
                            <a href='javascript:;' class='btn btn-sm view_community_info_btn' data-id='{$community['id']}'><i class='ti-info-alt'></i></a>
                            <a href='javascript:;' class='btn btn-sm del_community_info_btn' data-id='{$community['id']}'><i class='ti-trash'></i></a>
                        </td>
                    </tr>
                    ";
                }
            }
        }

        public function community_data($id)
        {
            return $this->communities->singlerecord($id);
        }

        public function faculty($cid)
        {
            return $this->communities->faculty($cid);
        }
        public function faculty_list($cid)
        {
            $dep = $this->faculty($cid);
            echo "<option value='{$dep['id']}' selected>{$dep['name']}</option>";
            $depts = new Department();
            $fetch_rule = "WHERE `id` <> $cid";
            $depts = $depts->records($fetch_rule);
            if($depts != "NO_DATA")
            {
                foreach ($depts as $dep) {
                    echo " <option value='{$dep['id']}'>{$dep['name']}</option>";
                }
            }
        }
    }

    // update-event.php?id={$event['id']}
    // $opr = new vAdmins();
    // echo "<pre>";
    // var_dump($opr->fetch_admins());
?>