<?php
    class uCourse{
        private $courses;
        private $data;
        function __construct($name)
        {
            $this->courses = new Courses();
            $this->data = $this->courses->singlerecord($name,"title");
        }

        public function exists()
        {
            if(!is_array($this->data)) return false;
            return true;
        }
        private function num_questions($cid)
        {
            $questions = new MCQ();
            $fetch_rule = "WHERE `cid` = ".$cid;
            return $questions->count($fetch_rule);
        }
        public function photo()
        {
            $record = $this->data;
            if(is_array($record))
            {
                return "
                <a href='#'><img src='assets/images/courses/{$record['photo']}' class = 'border' alt=''></a>
                ";


            }
        }
        public function overview()
        {
            $record = $this->data;
            if(is_array($record))
            {
                return "
                <li><i class='ti-stats-up'></i> <span class='label'>Level of study</span> <span class='value'>{$record['level']}</span></li>
                <li><i class='ti-smallcap'></i> <span class='label'>Language</span> <span class='value'>{$record['language']}</span></li>
                <li><i class='ti-comments'></i> <span class='label'>Questions</span> <span class='value'>{$this->num_questions($this->data['cid'])}</span></li>
                <li><i class='ti-check-box'></i> <span class='label'>Assessments</span> <span class='value'>Yes</span></li>
                ";
            }
        }

        public function description()
        {
            $record = $this->data;
            if(is_array($record))
            {
                return "<p>{$record['description']}</p>";
            }
        }

        public function related_courses()
        {
            $courses = new Courses();
            $questions = new MCQ();
            $fetch_rule = "WHERE `status` <> '0' AND `cid` = ".$this->data['cid'];
            $records = $courses->records($fetch_rule);
            if($records != "NO_DATA")
            {
                foreach ($records as $record) {
                    $slug = strtolower(preg_replace("/\s+/","-", $record['title'] ));
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
                                <li><a href='#'><i class='fa fa-comments-o'></i>{$this->num_questions($this->data['cid'])}</a></li>
                            </ul>
                            </div>
                        </div>
                    </div>
                    ";
                }
                
            }
        }
    }
?>