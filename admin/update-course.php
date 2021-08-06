<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("DCIT 103","Courses", "Update Course");

	require_once "apps/update-course.php";




	// footer
	echo $pageLauncher->getFooter();