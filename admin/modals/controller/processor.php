<?php

    // edit admin roles
    if(isset($_POST['action']) && $_POST['action'] =="edit_admin_role")
    {
        require_once "./../../../admin/core/roles.php";
        $roles = new Roles("./../../../");
        $role = $roles->singlerecord($_POST['id']);
        echo "
            <div class='ajax-message'></div>
            <div class='form-group row'>
                <label class='col-sm-4 col-form-label'>Role Name</label>
                <div class='col-sm-8'>
                    <input class='form-control' type='text' name = 'name'  value='{$role['name']}'>
                </div>
            </div>
            <div class='form-group row'>
                <label class='col-sm-4 col-form-label'>Description</label>
                <div class='col-sm-8'>
                    <textarea name='description' id='' cols='30' rows='10' class='form-control'>{$role['description']}</textarea>
                </div>
            </div>
        ";
    }
    // view admin roles
    if(isset($_POST['action']) && $_POST['action'] =="view_admin_role")
    {
        require_once "./../../../admin/core/roles.php";
        $roles = new Roles("./../../../");
        $role = $roles->singlerecord($_POST['id']);
        echo "
            <div class='row'>
                <div class='col-lg-12 col-md-12 col-sm-12'>
                    <div class='profile-bx text-center'>
                        <div class='user-profile-thumb'>
                            <img src='assets/images/other/role.jpg' alt=''/>
                        </div>
                        <div class='profile-info'>
                            <h4>AR-{$role['id']}</h4>
                            <div><b>{$role['name']}</b></div>
                            <div>
                                {$role['description']}
                            </div>
                            <div class='mt-3'>{$roles->getFullDate($role['date_added'])}</div>

                        </div>
                    </div>
                </div>
            </div>
        ";
    }


    // view admin info
    if(isset($_POST['action']) && $_POST['action'] =="view_admin_info")
    {
        // exit("Hello");
        require_once "./../../../admin/core/administrators.php";
        $admins = new Administrator("./../../../");
        $admin = $admins->singlerecord($_POST['id']);
        echo "
        <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>
            <div class='profile-bx text-center'>
                <div class='user-profile-thumb'>
                    <img src='assets/images/testimonials/{$admin['photo']}' alt=''/>
                </div>
                <div class='profile-info'>
                    <h4>{$admin['name']}</h4>
                    <div>{$admins->admin_role($admin['rid'], './../../../')['name']}</div>
                    <div>{$admin['email']}</div>
                    <div>{$admin['phone']}</div>

                </div>
                <div class='profile-social'>
                    <ul class='list-inline m-a0'>
                        <li><a target = '_blank' href='{$admin['facebook']}'><i class='fa fa-facebook'></i></a></li>
                        <li><a target = '_blank' href='{$admin['instagram']}'><i class='fa fa-instagram'></i></a></li>
                        <li><a target = '_blank' href='{$admin['twitter']}'><i class='fa fa-twitter'></i></a></li>
                        <li><a target = '_blank' href='{$admin['linkedin']}'><i class='fa fa-linkedin'></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        ";
    }

    // view event info
    if(isset($_POST['action']) && $_POST['action'] =="view_event_info")
    {
        // exit("Hello");
        require_once "./../../../admin/core/events.php";
        $events = new Event("./../../../");
        $event = $events->singlerecord($_POST['id']);
        echo "
        <div class=\"event-bx m-b30\">
            <div class=\"action-box\">
                <img src=\"../assets/images/event/{$event['flier']}\" alt=\"\">
            </div>
            <div class=\"info-bx d-flex\">
                <div>
                    <div class=\"event-time\">
                        <div class=\"event-date\">{$events->getDay($event['start'])}</div>
                        <div class=\"event-month\">{$events->getMonth($event['start'])}</div>
                    </div>
                </div>
                <div class=\"event-info\">
                    <h4 class=\"event-title\"><a href=\"#\">{$event['name']}</a></h4>
                    <ul class=\"media-post\">
                        <li><a href=\"#\"><i class=\"fa fa-clock-o\"></i>{$events->formatTime($event['start'])}</a></li>
                        <li><a href=\"#\"><i class=\"fa fa-map-marker\"></i>{$event['venue']}</a></li>
                        <li><a href=\"#\"><i class=\"ti-world\"></i>{$events->event_organizers($event['id'], './../../../')['name']}</a></li>
                    </ul>
                    <p>{$event['description']}</p>
                </div>
            </div>
        </div>
        ";
    }

    // edit-event-info
    if(isset($_POST['action']) && $_POST['action'] =="edit_event_info")
    {
        require_once "./../../../admin/core/events.php";
        $events = new Event("./../../../");
        $event = $events->singlerecord($_POST['id']);
        // 
        $timeFormat = 'Y-m-d\TH:i';
        $start = new DateTime($event['start']);
        $end = new DateTime($event['end']);
        echo "
        <div class='row'>
            <div class='form-group col-md-12 col-sm-12 col-12'>
                <label class='col-sm-12 col-form-label'>Event name</label>
                <div class='col-sm-12'>
                    <input class='form-control' type='text' name = 'name' value = '{$event['name']}'>
                </div>
            </div>
            <div class='form-group col-md-12 col-sm-12 col-12'>
                <label class='col-sm-12 col-form-label'>Description</label>
                <div class='col-sm-12'>
                    <textarea name='' id='' cols='30' rows='10' class='form-control'>{$event['description']}</textarea>
                </div>
            </div>
            <div class='form-group col-md-12 col-sm-12 col-12'>
                <label class='col-sm-12 col-form-label'>Rate</label>
                <div class='col-sm-12'>
                    <input class='form-control' type='text' value = '{$event['rate']}' >
                </div>
            </div>
            
            <div class='form-group col-md-12 col-sm-12 col-12'>
                <label class='col-sm-12 col-form-label'>Venue</label>
                <div class='col-sm-12'>
                    <input class='form-control' type='text' value = '{$event['venue']}'>
                </div>
            </div>
        </div>
        <div class='form-group row'>
            <div class='col-sm-5'>
                <input type='datetime-local' value = '{$start->format($timeFormat)}' id='from' class='form-control'>
            </div>
            <div class='col-sm-1'>
                <span class='btn disabled'>TO</span>
            </div>
            <div class='col-sm-6'>
                <input type='datetime-local' value = '{$end->format($timeFormat)}' id='to' class='form-control'>
            </div>
        </div>
        ";

    }
    // view-course-info
    if(isset($_POST['action']) && $_POST['action'] =="view_course_info")
    {
        require_once "./../../../admin/core/course.php";
        $courses = new Courses("./../../../");
        $course = $courses->singlerecord($_POST['id']);
        //
        if(is_array($course))
        {
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
        }else{
            echo "
            <div class='card-courses-list admin-courses'>
                <div class='card-courses-media'>
                    <img src='../assets/images/404.jpg' class = 'border' alt=''/>
                </div>
                <div class='card-courses-full-dec'>
                    <div class='card-courses-title'>
                        <h4>Course Not Found</h4>
                    </div>
                </div>
            </div>
            
            ";
        }

    }
    // view-community-info
    if(isset($_POST['action']) && $_POST['action'] =="view_com_info")
    {
        require_once "./../../../admin/core/communities.php";
        $coms = new Community("./../../../");
        $com = $coms->singlerecord($_POST['id']);
        //
        if(is_array($com))
        {
            echo "
            <div class='card-courses-list admin-courses'>
                <div class='card-courses-media'>
                    <img src='../assets/images/communities/{$com['logo']}' class = 'border' alt=''/>
                </div>
                <div class='card-courses-full-dec'>
                    <div class='card-courses-title'>
                        <h4>{$com['name']}</h4>
                    </div>
                    <div class='card-courses-list-bx'>
                        <ul class='card-courses-view'>
                            <li class='card-courses-categories'>
                                <h5><i class = 'ti-flag-alt-2'></i> Slug</h5>
                                <h4> {$com['slug']}</h4>
                            </li>
                            <li class='card-courses-categories'>
                                <h5><i class = 'ti-world'></i> Faculty</h5>
                                <h4>{$coms->faculty($com['cid'], './../../../')['name']}</h4>
                            </li>
                        </ul>
                    </div>
                    <div class='row card-courses-dec'>
                        <div class='col-md-12'>
                            <h6 class='m-b10'>About {$com['slug']}</h6>
                            <p>{$com['about']}</p>	
                        </div>
                    </div>
                    
                </div>
            </div>
            ";
        }else{
            echo "
            <div class='card-courses-list admin-courses'>
                <div class='card-courses-media'>
                    <img src='../assets/images/404.jpg' class = 'border' alt=''/>
                </div>
                <div class='card-courses-full-dec'>
                    <div class='card-courses-title'>
                        <h4>Course Not Found</h4>
                    </div>
                </div>
            </div>
            
            ";
        }

    }


    // edit-portfolio-info
    if(isset($_POST['action']) && $_POST['action'] =="edit_portfolio_info")
    {
        require_once "./../../../admin/core/portfolio.php";
        $portfolios = new Portfolio("./../../../");
        $portfolio = $portfolios->singlerecord($_POST['id']);
        
        echo "
        <div class='form-group row'>
            <label class='col-sm-4 col-form-label'>Community</label>
            <div class='col-sm-8'>
                <select name='role' id='role'  class='form-control custom-select' required>
                    <option value='{$portfolios->community($portfolio['cid'], './../../../')['id']}'>{$portfolios->community($portfolio['cid'], './../../../')['name']}</option>
                    ";
                    $others = $portfolios->other_communities($portfolio['cid']);
                    if($others !="NO_DATA")
                    {
                        foreach ($others as $other) {
                            echo "<option value='{$other['id']}'>{$other['name']}</option>";
                        }
                    }
                    echo "
                </select>
            </div>
        </div>
        <div class='form-group row'>
            <label class='col-sm-4 col-form-label'>Portfolio Name</label>
            <div class='col-sm-8'>
                <input class='form-control' type='text' value='{$portfolio['name']}'  required>
            </div>
        </div>
        ";

    }

    // view-course-info
    if(isset($_POST['action']) && $_POST['action'] =="view_faculty_info")
    {
        require_once "./../../../admin/core/department.php";
        $facultys = new Department("./../../../");
        $faculty = $facultys->singlerecord($_POST['id']);
        //
        if(is_array($faculty))
        {
            echo "
            <div class='card-courses-list admin-courses'>
                <div class='card-courses-media'>
                    <img src='../assets/images/schools/{$faculty['photo']}' class = 'border' alt=''/>
                </div>
                <div class='card-courses-full-dec'>
                    <div class='card-courses-title'>
                        <h4>{$faculty['name']}</h4>
                    </div>
                    <div class='card-courses-list-bx'>
                        <ul class='card-courses-view'>
                            <li class='card-courses-review'>
                                <h5><i class='ti-email'></i> Email</h5>
                                <a href='javascript:;' class='btn button-sm yellow radius-xl'>{$faculty['email']}</a>
                            </li>
                            <li class='card-courses-review'>
                                <h5>Connect</h5>
                                <ul class='cours-star'>";
                                if(isset($faculty['facebook'])) echo "<li class='active'><a href='#' class='btn-link'> <i class='fa fa-facebook'></i></a></li>";
                                if(isset($faculty['instagram'])) echo "<li class='active'><a href='#' class='btn-link'> <i class='fa fa-instagram'></i></a></li>";
                                if(isset($faculty['telegram'])) echo "<li class='active'><a href='#' class='btn-link'> <i class='fa fa-telegram'></i></a></li>";
                                echo "
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class='row card-courses-dec'>
                        <div class='col-md-12'>
                            <h6 class='m-b10'>About Faculty</h6>
                            <p>{$faculty['description']}</p>	
                        </div>
                    </div>
                    <div class='row card-courses-dec'>
                        <div class='col-md-12'>
                            <h6 class='m-b10'><i class='ti-location-pin'></i> {$faculty['address']}</h6>
                            <p></p>	
                        </div>
                    </div>
                    
                </div>
            </div>
            ";
        }else{
            echo "
            <div class='card-courses-list admin-courses'>
                <div class='card-courses-media'>
                    <img src='../assets/images/404.jpg' class = 'border' alt=''/>
                </div>
                <div class='card-courses-full-dec'>
                    <div class='card-courses-title'>
                        <h4>Course Not Found</h4>
                    </div>
                </div>
            </div>
            
            ";
        }

    }
?>