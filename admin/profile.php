<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Profile","Profile", "Update");

	require_once "apps/profile.php";



	// footer
	echo $pageLauncher->getFooter();
