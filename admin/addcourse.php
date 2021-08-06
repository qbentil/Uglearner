<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Add Course ","Courses", "New Course");

	require_once "apps/addcourse.php";




	// footer
	echo $pageLauncher->getFooter();