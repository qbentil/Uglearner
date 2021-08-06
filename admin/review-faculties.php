<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Review Faculty","Faculties", "Review");

	require_once "apps/reviews.php";



	// footer
	echo $pageLauncher->getFooter();