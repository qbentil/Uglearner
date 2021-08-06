<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Communities","Communities", "New Community");

	require_once "apps/new-com.php";






	// footer
	echo $pageLauncher->getFooter();