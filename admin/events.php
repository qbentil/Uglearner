<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Events ","Events", "Manage");

	require_once "apps/events.php";






	// footer
	echo $pageLauncher->getFooter();