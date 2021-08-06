<?php
    class uSchool{
        private $schools;
        private $data;
        function __construct($name)
        {
            $this->schools = new Department();
            $this->data = $this->schools->singlerecord($name, "name");
        }

        public function exists()
        {
            if(!is_array($this->data)) return false;
            return true;
        }
        // private function num_questions($cid)
        // {
        //     $questions = new MCQ();
        //     $fetch_rule = "WHERE `cid` = ".$cid;
        //     return $questions->count($fetch_rule);
        // }
        public function photo()
        {
            $record = $this->data;
            if(is_array($record))
            {
                return "
                <a href='javascript:;'><img src='assets/images/schools/{$record['photo']}' class = 'border' alt='photo'></a>
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

        public function contact_info()
        {
            $record = $this->data;
            if(is_array($record))
            {
                return "
                <div class='bg-primary text-white contact-info-bx m-b30'>
                    <h2 class='m-b10 title-head'>Contact <span>Information</span></h2>
                    <p>Get in touch with us for support / questions</p>
                    <div class='widget widget_getintuch'>	
                        <ul>
                            <li><i class='ti-location-pin'></i>{$record['address']}</li>
                            <li><i class='ti-mobile'></i>(24/7 Support Line)</li>
                            <li><i class='ti-email'></i>{$record['email']}</li>
                        </ul>
                    </div>
                    <h5 class='m-t0 m-b20'>Follow Us</h5>
                    <ul class='list-inline contact-social-bx'>
                        <li><a href='{$this->val_check($record['facebook'])}' target = '_blank' class='btn outline radius-xl'><i class='fa fa-facebook'></i></a></li>
                        <li><a href='{$this->val_check($record['twitter'])}' target = '_blank' class='btn outline radius-xl'><i class='fa fa-twitter'></i></a></li>
                        <li><a href='{$this->val_check($record['telegram'])}' target = '_blank' class='btn outline radius-xl'><i class='fa fa-telegram'></i></a></li>
                        <!--<li><a href='{$this->val_check(null)}' target = '_blank' class='btn outline radius-xl'><i class='fa fa-instagram'></i></a></li>-->
                    </ul>
                </div>
                ";
            }
        }

        public function id()
        {
            return $this->data['id'];
        }


        private function val_check($item, $def="#")
        {
            return !isset($item)? $def:$item;
        }
    }
?>