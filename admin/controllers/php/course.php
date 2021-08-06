<?php
    if(isset($_POST['action']) && $_POST['action'] == "course_search")
    {
            echo search( $_POST['query']);
    }

    function search($query)
    {
        require_once "./../../../admin/core/course.php";
        $courses = new Courses("./../../../");
        $fetch_rule = "WHERE `title` LIKE '%$query%'";
        $course = $courses->records($fetch_rule);
        
        if($course !="NO_DATA")
        {
            foreach ($course as $course) {
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
                                    <h4>{$courses->faculty($course['cid'], './../../../')['name']}</h4>
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
                    <img src='../assets/images/404.jpg' alt=''/>
                </div>
                <div class=\"row\">
                    <div class='col-md-12 card-courses-full-dec'>
                    <div class='card-courses-title'>
                        <h4 class = 'text-danger'>ERROR 404!</h4>
                    </div>
                    </div>
                    <div class='col-md-12 card-courses-list-bx'>
                        <div class='col-md-12'>
                            <!--<h6 class='m-b10'>Not Found</h6>-->
                            <p>No records matches your query. Check your spelling and try again.</p>	
                        </div>
                    </div>
                </div>
            </div>
            
            ";
        }
    }
?>