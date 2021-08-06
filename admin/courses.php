<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Manage Courses","Courses", "Manage");

	require_once "apps/courses.php";




	// footer
	echo $pageLauncher->getFooter();