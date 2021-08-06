<?php
	$name = str_replace("-", " ", $_GET['q']);
	$course = new uSchool($name);

    if (!$course->exists()) {

        // echo "<script> location.replace(\"courses.php\"); </script>";
        echo "<script> window.history.back(); </script>";
    }


?>
<div class="col-lg-4 col-md-5 col-sm-12 m-b30">
    <!-- nav -->
    <div class="course-detail-bx">
        <div class="title">
            <h4>Naviations</h4>
        </div>
        <div class="ttr-post-media media-effect mt-4">
            <?php echo $course->photo() ?>
        </div>
        <div class="course-info-list scroll-page">
            <ul class="navbar">
                <li><a class="nav-link" href="#overview"><i class="ti-zip"></i>Overview</a></li>
                <li><a class="nav-link" href="#portfolio"><i class="ti-user"></i>Programmes</a></li>
                <li><a class="nav-link" href="events.php?q=<?php echo $_GET['q'] ?>"><i class="ti-user"></i>Events</a></li>
                <li><a class="nav-link" href="#contact"><i class="ti-bookmark-alt"></i>Contact info</a></li>
                <li><a class="nav-link" href="#reviews"><i class="ti-comments"></i>Reviews</a></li>
            </ul>
        </div>

        <div class="teacher-bx">
            <div class="title">
                <h4>Summary</h4>
            </div>
        </div>
        <div class="cours-more-info">
            <div class="review">
                <span>3 Review</span>
                <ul class="cours-star">
                    <li class="active"><i class="fa fa-star"></i></li>
                    <li class="active"><i class="fa fa-star"></i></li>
                    <li class="active"><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                </ul>
            </div>
            <div class="price categories">
                <span>School / Department</span>
                <h5 class="text-primary"><?php echo $name; ?></h5>
            </div>
        </div>
        <div class="course-info-list">
            <ul class="course-features">
                <li><i class="ti-book"></i> <span class="label">Topics</span> <span class="value">Web design</span></li>
                <li><i class="ti-help-alt"></i> <span class="label">Host</span> <span class="value">ugLearner</span></li>
                <li><i class="ti-time"></i> <span class="label">Location</span> <span class="value">#45 Road</span></li>
                <li><i class="ti-stats-up"></i> <span class="label">Skill level</span> <span class="value">Beginner</span></li>
                <li><i class="ti-smallcap"></i> <span class="label">Language</span> <span class="value">English</span></li>
                <li><i class="ti-user"></i> <span class="label">Students</span> <span class="value">32</span></li>
                <li><i class="ti-check-box"></i> <span class="label">Assessments</span> <span class="value">Yes</span></li>
            </ul>
        </div>
    </div>
    <!-- nav -->
</div>	