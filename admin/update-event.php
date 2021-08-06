<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Events","Event Management", "Update Event");

	require_once "apps/update-event.php";




	// footer
	echo $pageLauncher->getFooter();