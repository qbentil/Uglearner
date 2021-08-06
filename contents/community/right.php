<?php
	$name = str_replace("-", " ", $_GET['q']);
	$community = new uCommunity($name);

    if (!$community->exists()) {

        echo "<script> location.replace(\"communities.php\"); </script>";
        // echo "<script> window.history.back(); </script>";
    }


?>
<div class="col-lg-8 col-md-7 col-sm-12">
        <div class="courese-overview" id="overview">
            <div class="courses-post">
                <div class="ttr-post-info">
                    <div class="ttr-post-title ">
                        <h2 class="post-title"><?php echo $community->slug(); ?></h2>
                    </div>
                </div>
                <div class="ttr-post-media media-effect">
                    <?php echo $community->photo(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <h5 class="m-b1 m-t3">About Community</h5>
                    <p>
                        <?php echo $community->description() ?>
                    </p>
                    <h5 class="m-b5">Objectives</h5>
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
            include "portfolio.php" ;
            echo $community->contact_info();
            include "reviews.php" ;
        ?>						
    </div>	