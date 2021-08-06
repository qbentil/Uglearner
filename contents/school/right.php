<?php
    $name = str_replace("-", " ", $_GET['q']);
    $course = new uSchool($name);




?>
<div class="col-lg-8 col-md-7 col-sm-12">
        <div class="courese-overview" id="overview">
            <div class="courses-post">
                <div class="ttr-post-info">
                    <div class="ttr-post-title ">
                        <h2 class="post-title">Intro</h2>
                    </div>
                    <div class="ttr-post-text">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <h5 class="m-b5">Course Description</h5>
                    <?php echo $course->description() ?>
                    <!-- <h5 class="m-b5">Certification</h5> -->
                    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p> -->
                    <h5 class="m-b5">Learning Outcomes</h5>
                    <ul class="list-checked primary">
                        <li>Over 37 lectures and 55.5 hours of content!</li>
                        <li>LIVE PROJECT End to End Software Testing Training Included.</li>
                        <li>Learn Software Testing and Automation basics from a professional trainer from your own desk.</li>
                        <li>Information packed practical training starting from basics to advanced testing techniques.</li>
                        <li>Best suitable for beginners to advanced level users and who learn faster when demonstrated.</li>
                        <li>Course content designed by considering current software testing technology and the job market.</li>
                        <li>Practical assignments at the end of every session.</li>
                        <li>Practical learning experience with live project work and examples.cv</li>
                    </ul>
                </div>
            </div>
        </div>
        <?php 
            include "programmes.php" ;
            include "contact.php" ;
            include "reviews.php" ;
        ?>						
    </div>	