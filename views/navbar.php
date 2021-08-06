<?php
    class Dropdowns{

        // private $lim;
        function __construct(){
            require "admin/core/course.php";
            require "admin/core/department.php";
            require "admin/core/events.php";
            require "admin/core/communities.php";
            require "admin/core/mcq.php";
        }


        public function communities($fetch_rule = "LIMIT 5")
        {
            $com = new Community();
            $records = $com->records($fetch_rule);
            if($records != "NO_DATA")
            {
                foreach ($records as $record) {
                    $slug = strtolower(preg_replace("/\s+/","-", $record['name'] ));
                    echo "
                        <li><a href='community.php?q={$slug}'>{$record['slug']}</a></li>
                    ";
                }
                if($com->count() > 5) echo "<li><a href='#'>See more</a></li>";
            }
        }
        public function colleges($fetch_rule = "LIMIT 5")
        {
            $dep = new Department();
            $records = $dep->records($fetch_rule);
            if($records != "NO_DATA")
            {
                foreach ($records as $record) {
                    $slug = strtolower(preg_replace("/\s+/","-", $record['name'] ));
                    echo "
                        <li><a href='school.php?q={$slug}'>{$record['name']}</a></li>
                    ";
                }
                if($dep->count() > 5) echo "<li><a href='#'>See more</a></li>";
            }
        }
        public function courses($fetch_rule = "WHERE `status` <> '0' LIMIT 5")
        {
            $courses = new Courses();
            $records = $courses->records($fetch_rule);
            if($records != "NO_DATA")
            {
                foreach ($records as $record) {
                    $slug = strtolower(preg_replace("/\s+/","-", $record['title'] ));
                    echo "
                        <li><a href='course.php?q={$slug}'>{$record['tid']}</a></li>
                    ";
                }
                if($courses->count() > 5) echo "<li><a href='#'>See more</a></li>";
                
            }
        }

    }

    // $v = new Views();
    // echo $v->get_courses();
?>