<?php

    $name = str_replace("-", " ", $_GET['q']);
    $course = new uSchool($name);
    $views = new Views();



?>
<div class="m-b30" id="portfolio">
    <h4>Courses</h4>
    <div class="row">						
        <?php 
        $rule = "WHERE `cid` = {$course->id()}";
         $views->get_courses(null, $rule);  
        ?>
        <div class="col-lg-12 m-b20">
            <div class="pagination-bx rounded-sm gray clearfix">
                <ul class="pagination">
                    <li class="previous"><a href="#"><i class="ti-arrow-left"></i> Prev</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="next"><a href="#">Next <i class="ti-arrow-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>