<?php
	$name = str_replace("-", " ", $_GET['q']);
	$course = new uCourse($name);

    if (!$course->exists()) {

        // echo "<script> location.replace(\"courses.php\"); </script>";
        echo "<script> window.history.back(); </script>";
    }


?>

		<div class="col-md-5 col-lg-4 col-xl-4 col-sm-12 m-b30">
							<aside class="side-bar sticky-top">
								<div class="widget">
									<div class="ttr-post-media media-effect">
										<?php echo $course->photo(); ?>
									</div>
								</div>
								<div class="col-md-12 col-lg-12">
									<h4>Overview</h4>
									<ul class="course-features">
										<?php echo $course->overview(); ?>
									</ul>
								</div>
								<div class="col-md-12 col-lg-12">
									<h5 class="m-b5">About '<?php echo ucwords($name); ?>'</h5>
									<?php echo $course->description(); ?>
								</div>
								<div class="widget recent-posts-entry">
									<h6 class="widget-title">Related Courses</h6>
									<div class="widget-post-bx">
										<?php echo $course->related_courses() ?>
									</div>
								</div>
								<?php 
									$pages = new PageLauncher();
									echo $pages->form("request_form");
								?>
								<!-- <div class="widget widget_tag_cloud">
									<h6 class="widget-title">Tags</h6>
									<div class="tagcloud"> 
										<a href="#">Design</a> 
										<a href="#">User interface</a> 
										<a href="#">SEO</a> 
										<a href="#">WordPress</a> 
										<a href="#">Development</a> 
										<a href="#">Joomla</a> 
										<a href="#">Design</a> 
										<a href="#">User interface</a> 
										<a href="#">SEO</a> 
										<a href="#">WordPress</a> 
										<a href="#">Development</a> 
										<a href="#">Joomla</a> 
										<a href="#">Design</a> 
										<a href="#">User interface</a> 
										<a href="#">SEO</a> 
										<a href="#">WordPress</a> 
										<a href="#">Development</a> 
										<a href="#">Joomla</a> 
									</div>
								</div> -->
								<?php 
									$pages = new PageLauncher();
									echo $pages->form("course_feedback_form");
								?>
							</aside>
						</div>