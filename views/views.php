<?php
    class Views{

        function __construct(){
            // require "admin/core/course.php";
            // require "admin/core/department.php";
            // require "admin/core/events.php";
            // require "admin/core/communities.php";
        }
        
        // courses view
        public function get_courses($at, $fetch_rule = "WHERE `status` <> '0' ORDER BY `tid`")
        {
            $courses = new Courses();
            $department = new Department();
            $records = $courses->records($fetch_rule);

            $wrapper = $at == "home"? "item": "col-md-6 col-lg-4 col-sm-6 m-b30";
            if($records != "NO_DATA")
            {
                foreach ($records as $record) {
                    $slug = strtolower(preg_replace("/\s+/","-", $record['title'] ));
                    echo "
                    <div class=\"{$wrapper}\">
                        <div class=\"cours-bx\">
                            <div class=\"action-box\">
                                <img src='assets/images/courses/{$record['photo']}' class = 'border' alt=''>
                                <a href=\"course.php?q={$slug}\" class=\"btn\">Read More</a>
                            </div>
                            <div class=\"info-bx text-center\">
                                <h5><a href=\"#\">{$record['title']}</a></h5>
                                <span>{$department->singlerecord($record['cid'])['name']}</span>
                            </div>
                            <div class=\"cours-more-info\">
                                <div class=\"review\">
                                    <span>3 Review</span>
                                    <ul class=\"cours-star\">
                                        <li class=\"active\"><i class=\"fa fa-star\"></i></li>
                                        <li class=\"active\"><i class=\"fa fa-star\"></i></li>
                                        <li class=\"active\"><i class=\"fa fa-star\"></i></li>
                                        <li><i class=\"fa fa-star\"></i></li>
                                        <li><i class=\"fa fa-star\"></i></li>
                                    </ul>
                                </div>
                                <div class=\"review\">
                                    <span>Action</span>
                                    <span><a href = 'course.php?q={$slug}' class = 'btn'>Quiz</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
                }
            }else{
                echo "<div class '{$wrapper}'> <span class = 'mute'>No Data.....</span></div>";
            }
        }

        // events view
        public function get_events($at, $fetch_rule = "ORDER BY name LIMIT 10")
        {
            if($at != "home")
            {
                $wrapper = "action-card col-lg-6 col-md-6 col-sm-12";
                $margin = "m-b30";
            }else{
                $wrapper = "item";
                $margin = NULL;  
            }
            $event = new Event();
            $records = $event->records($fetch_rule, "events");
            if($records != "NO_DATA")
            {
                $today = new DateTime();
                foreach ($records as $record) {
                    // Checking event status
                    switch($date = $this->getDate($record['start']))
                    {
                        case $date > $today:
                            $filter = "upcoming";
                            break;
                        case $date < $today:
                            $filter = "expired";
                            break;
                        default:
                            $filter = "happening";
                            break;
                    }
                    echo "
                    <div class=\"{$wrapper} {$filter}\">
                        <div class=\"event-bx {$margin}\">
                            <div class=\"action-box\">
                                <img src=\"assets/images/event/{$record['flier']}\" alt=\"\">
                            </div>
                            <div class=\"info-bx d-flex\">
                                <div>
                                    <div class=\"event-time\">
                                        <div class=\"event-date\">{$event->getDay($record['start'])}</div>
                                        <div class=\"event-month\">{$event->getMonth($record['start'])}</div>
                                    </div>
                                </div>
                                <div class=\"event-info\">
                                    <h4 class=\"event-title\"><a href=\"#\">{$record['name']}</a></h4>
                                    <ul class=\"media-post\">
                                        <li><a href=\"#\"><i class=\"fa fa-clock-o\"></i>{$event->formatTime($record['start'])}</a></li>
                                        <li><a href=\"#\"><i class=\"fa fa-map-marker\"></i>{$record['venue']}</a></li>
                                        <li><a href=\"#\"><i class=\"ti-world\"></i>{$event->event_organizers($record['id'], NULL)['name']}</a></li>
                                    </ul>
                                    <p>{$record['description']}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
                }
            }else{
                echo "<div class '{$wrapper}'> <span class = 'mute'>No Data.....</span></div>";
            }
        }

        public function get_schools($fetch_rule=NULL)
        {
            $department = new Department();
            $records = $department->records($fetch_rule);

            if($records != "NO_DATA")
            {
                foreach ($records as $record) {
                    $slug = strtolower(preg_replace("/\s+/","-", $record['name'] ));
                    echo "
                    <div class='col-md-6 col-lg-4 col-sm-6 m-b30'>
                        <div class='cours-bx'>
                            <div class='action-box'>
                                <img src='assets/images/schools/{$this->val_check($record['photo'], 'pic1.jpg')}' alt='photo'>
                                <a href='school.php?q={$slug}' class='btn'>Read More</a>
                            </div>
                            <div class='info-bx text-center'>
                                <h5><a href='#'>{$record['name']}</a></h5>
                                <!--<span><a href='#'>Courses</a></span>-->
                            </div>
                            <div class='cours-more-info'>
                                <div class='review'>
                                    <span>Socials</span>
                                    <ul class='cours-star'>
                                        <li class='active'><a class='mr-2' target = '_blank' href='{$this->val_check($record['facebook'])}'><i class='fa fa-facebook'></i></a></li>
                                        <li class='active'><a class='mr-2' target = '_blank' href='{$this->val_check($record['telegram'])}'><i class='fa fa-telegram'></i></a></li>
                                        <li class='active'><a class='mr-2' target = '_blank' href='{$this->val_check($record['twitter'])}'><i class='fa fa-twitter'></i></a></li>
                                    </ul>
                                </div>
                                <div class='review'>
                                    <span>Contacts</span>
                                    <ul class='cours-star'>
                                        <li class='active'><a class='mr-2' target='_blank' href='mailto:{$record['email']}'><i class='ti-email'></i></a></li>
                                        <li class='active'><a class='mr-2' target='_blank' href='#'><i class='ti-phone'></i></a></li>
                                        <li class='active'><a class='mr-2' target='_blank' href='#'><i class='ti-location-pin'></i></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    ";
                }
            }
        }
        public function get_communities($fetch_rule=NULL)
        {
            $department = new Community();
            $records = $department->records($fetch_rule);

            if($records != "NO_DATA")
            {
                foreach ($records as $record) {
                    $slug = strtolower(preg_replace("/\s+/","-", $record['name'] ));
                    echo "
                    <div class='col-md-6 col-lg-4 col-sm-6 m-b30'>
                        <div class='cours-bx'>
                            <div class='action-box'>
                                <img src='assets/images/communities/{$this->val_check($record['photo'], 'pic1.jpg')}' alt='photo'>
                                <a href='community.php?q={$slug}' class='btn'>Read More</a>
                            </div>
                            <div class='info-bx text-center'>
                                <h5><a href='community.php?q={$slug}'>{$record['name']}</a></h5>
                                <span><a href='#'>{$record['slug']}</a></span>
                            </div>
                            <div class='cours-more-info'>
                                <div class='review'>
                                    <span>Socials</span>
                                    <ul class='cours-star'>
                                        <li class='active'><a class='mr-2' target = '_blank' href='{$this->val_check($record['facebook'])}'><i class='fa fa-facebook'></i></a></li>
                                        <li class='active'><a class='mr-2' target = '_blank' href='{$this->val_check($record['instagram'])}'><i class='fa fa-instagram'></i></a></li>
                                        <li class='active'><a class='mr-2' target = '_blank' href='{$this->val_check($record['twitter'])}'><i class='fa fa-twitter'></i></a></li>
                                    </ul>
                                </div>
                                <div class='review'>
                                    <span>Contacts</span>
                                    <ul class='cours-star'>
                                        <li class='active'><a class='mr-2' target='_blank' href='mailto:{$record['email']}'><i class='ti-email'></i></a></li>
                                        <!--<li class='active'><a class='mr-2' target='_blank' href='#'><i class='ti-phone'></i></a></li>
                                        <li class='active'><a class='mr-2' target='_blank' href='#'><i class='ti-location-pin'></i></a></li>-->
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    ";
                }
            }
        }
        private function getDate($date)
        {
            $dt = new DateTime($date);
    
            return $dt->format('Y-m-d');
        }

        private function val_check($item, $def="#")
        {
            return !isset($item)? $def:$item;
        }

    }

    // $v = new Views();
    // echo $v->get_courses();
?>