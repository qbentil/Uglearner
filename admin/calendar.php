<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Calendar ","Calendar", "Events");

	require_once "apps/calendar.php";






	// footer
	echo $pageLauncher->getFooter();