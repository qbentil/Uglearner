<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Events","Event Management", "Create Event");

	require_once "apps/new-event.php";




	// footer
	echo $pageLauncher->getFooter();