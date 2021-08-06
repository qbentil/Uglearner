<?php
    class Listing{

        // private $lim;
        function __construct(){
            // require "admin/core/course.php";
            // require "admin/core/department.php";
            // require "admin/core/events.php";
            // require "admin/core/communities.php";
        }


        public function communities($fetch_rule = "LIMIT 10")
        {
            $com = new Community();
            $records = $com->records($fetch_rule);
            if($records != "NO_DATA")
            {
                foreach ($records as $record) {
                    $slug = strtolower(preg_replace("/\s+/","-", $record['name'] ));
                    echo "
                        <li><a href='comminty.php?q={$slug}'>{$record['slug']}</a></li>
                    ";
                }
                if($com->count() > 7) echo "<li><a href='#'>See more</a></li>";
            }
        }
        public function colleges($fetch_rule = "LIMIT 7")
        {
            $dep = new Department();
            $records = $dep->records($fetch_rule);
            if($records != "NO_DATA")
            {
                foreach ($records as $record) {
                    $slug = strtolower(preg_replace("/\s+/","-", $record['name'] ));
                    echo "
                        <li><a href='#?{$slug}'>{$record['name']}</a></li>
                    ";
                }
                if($dep->count() > 7) echo "<li><a href='#'>See more</a></li>";
            }
        }
        public function courses($fetch_rule = "WHERE `status` <> '0' LIMIT 7")
        {
            $courses = new Courses();
            $records = $courses->records($fetch_rule);
            if($records != "NO_DATA")
            {
                foreach ($records as $record) {
                    $slug = strtolower(preg_replace("/\s+/","-", $record['title'] ));
                    echo "
                        <li ><a href='course.php?q={$slug}'>{$record['tid']}</a></li>
                    ";
                }
                if($courses->count() > 7) echo "<li><a href=''courses.php>See more</a></li>";
                
            }
        }
        public function recent_courses($fetch_rule = "WHERE `status` <> '0' LIMIT 5")
        {
            $courses = new Courses();
            $records = $courses->records($fetch_rule);

            $questions = new MCQ();
            if($records != "NO_DATA")
            {
                foreach ($records as $record) {
                    $slug = strtolower(preg_replace("/\s+/","-", $record['title'] ));
                    $rule = "WHERE `cid` = ".$record['cid'];
                    echo "
                    <div class='widget-post clearfix'>
                        <div class='ttr-post-media'> <img src='assets/images/courses/{$record['photo']}' class = 'border' width='200' height='143' alt=''> </div>
                        <div class='ttr-post-info'>
                            <div class='ttr-post-header'>
                                <h6 class='post-title'><a href='course.php?q={$slug}'>{$record['title']}</a></h6>
                            </div>
                            <div class='ttr-post-meta'>
                            <ul class='media-post'>
                                <li><a href='#'><i class='fa fa-calendar'></i>{$courses->getFullDate($record['date_added'])}</a></li>
                                <li><a href='#'><i class='fa fa-comments-o'></i>{$questions->count($rule)}</a></li>
                            </ul>
                            </div>
                        </div>
                    </div>
                    ";
                }
                
            }
        }

        public function recents_schools($limit = 5)
        {
            $fetch_rule = "ORDER BY `date_added` DESC LIMIT {$limit}";
            $schools = new Department();
            $records = $schools->records($fetch_rule);
            if($records != "NO_DATA")
            {
                foreach ($records as $record) {
                    $slug = strtolower(preg_replace("/\s+/","-", $record['name'] ));
                    echo "
                    <div class='widget-post clearfix'>
                        <div class='ttr-post-media'> <img src='assets/images/schools/{$this->val_check($record['photo'], 'pic1.jpg')}' width='200' height='143' alt=''> </div>
                        <div class='ttr-post-info'>
                            <div class='ttr-post-header'>
                                <h6 class='post-title'><a href='school.php?q={$slug}'>{$record['name']}</a></h6>
                            </div>
                            <div class='ttr-post-meta'>
                                <ul>
                                    <li class='review'>{$this->getDate($record['date_added'])}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    ";
                }
                
            }
        }
        public function recents_communities($limit = 5)
        {
            $fetch_rule = "ORDER BY `date_added` DESC LIMIT {$limit}";
            $schools = new Community();
            $records = $schools->records($fetch_rule);
            if($records != "NO_DATA")
            {
                foreach ($records as $record) {
                    $slug = strtolower(preg_replace("/\s+/","-", $record['name'] ));
                    echo "
                    <div class='widget-post clearfix'>
                        <div class='ttr-post-media'> <img src='assets/images/communities/{$this->val_check($record['photo'], 'pic1.jpg')}' width='200' height='143' alt=''> </div>
                        <div class='ttr-post-info'>
                            <div class='ttr-post-header'>
                                <h6 class='post-title'><a href='community.php?q={$slug}'>{$record['name']}</a></h6>
                            </div>
                            <div class='ttr-post-meta'>
                                <ul>
                                    <li class='review'>{$this->getDate($record['date_added'])}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    ";
                }
                
            }
        }

        private function val_check($item, $def="#")
        {
            return !isset($item)? $def:$item;
        }
        private function getDate($date)
        {
            $dt = new DateTime($date);
    
            return $dt->format('l, F jS, Y.');
        }

    }

    // $v = new Views();
    // echo $v->get_courses();
?>