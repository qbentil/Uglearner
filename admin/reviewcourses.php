<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Review Courses","Courses", "Review");

	require_once "apps/coursereview.php";



	// footer
	echo $pageLauncher->getFooter();