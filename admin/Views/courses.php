<?php

    class vCourses{
        private $courses;
        function __construct()
        {
            require_once "./core/course.php";
            $this->courses = new Courses("../");
        }


        public function fetch_courses($fetch_rule = NULL)
        {
            $courses = $this->courses->records($fetch_rule);
            if($courses !="NO_DATA")
            {
                // return $courses;
                foreach ($courses as $course) {
                    echo "
                    <tr>
                        <td class = 'text-uppercase'>{$course['tid']}</td>
                        <td>{$course['title']}</td>
                        <td class = 'text-center'>{$course['level']}</td>
                        <td>{$this->courses->status($course['id'])}</td>
                        <td>
                            <a href='javascript:;' class='btn btn-sm edit_course_info_btn' data-id='{$course['id']}' ><i class='ti-pencil-alt'></i></a>
                            <a href='javascript:;' class='btn btn-sm view_course_info_btn' data-id='{$course['id']}'><i class='ti-info-alt'></i></a>
                            <a href='javascript:;' class='btn btn-sm del_course_info_btn' data-id='{$course['id']}'><i class='ti-trash'></i></a>
                        </td>
                    </tr>
                    ";
                }
            }
        }

        public function review_courses($fetch_rule = NULL)
        {
            $courses = $this->courses->records($fetch_rule);
            if($courses != "NO_DATA")
            {
                foreach ($courses as $course) {
                    echo "
                    <div class='card-courses-list admin-courses'>
                        <div class='card-courses-media'>
                            <img src='../assets/images/courses/{$course['photo']}' class = 'border' alt=''/>
                        </div>
                        <div class='card-courses-full-dec'>
                            <div class='card-courses-title'>
                                <h4>{$course['title']}</h4>
                            </div>
                            <div class='card-courses-list-bx'>
                                <ul class='card-courses-view'>
                                    <li class='card-courses-categories'>
                                        <h5><i class='ti-world'></i> Faculty</h5>
                                        <h4>{$this->courses->faculty($course['cid'])['name']}</h4>
                                    </li>
                                    <li class='card-courses-review'>
                                        <h5>Level of study</h5>
                                        <a href='javascript:;' class='btn button-sm yellow radius-xl'>{$course['level']}</a>
                                    </li>
                                    <!--<ul class='cours-star'>
                                        <li class='active'><i class='fa fa-star'></i></li>
                                        <li class='active'><i class='fa fa-star'></i></li>
                                        <li class='active'><i class='fa fa-star'></i></li>
                                        <li class='active'><i class='fa fa-star'></i></li>
                                    </ul>-->";
                                    $col = $course['status'] == 1? "red":"green";
                                    $text = $course['status'] == 1? "Revoke":"Approve";
            
                                    echo "<li class='card-courses-price'>
                                        <a href='javascript:;' class='btn {$col} radius-xl outline course_status_toggler' data-id= '{$course['id']}'>{$text}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class='row card-courses-dec'>
                                <div class='col-md-12'>
                                    <h6 class='m-b10'>Course Description</h6>
                                    <p>{$course['description']}</p>	
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    ";
                }
            }else{
                echo "
                <div class='card-courses-list admin-courses'>
                    <div class='card-courses-media'>
                        <img src='../assets/images/courses/404.jpg' class = 'border' alt=''/>
                    </div>
                    <div class='card-courses-full-dec'>
                        <div class='card-courses-title'>
                            <h4>Courses Not Found</h4>
                        </div>
                    </div>
                </div>
                
                ";
            }
        }

        public function course_data($id)
        {
            return $this->courses->singlerecord($id);
        }

        // public function admin_data($id)
        // {
        //     return $this->courses->singlerecord($id);
        // }
        // public function role($rid)
        // {
        //     return $this->courses->admin_role($rid);
        // }

    }

?>