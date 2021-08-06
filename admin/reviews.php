<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("MCQ Reviews","Reviews", "Manage");

	require_once "apps/reviews.php";


	// footer
	echo $pageLauncher->getFooter();