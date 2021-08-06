<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("User Roles","Roles", "New Role");

	require_once "apps/newrole.php";






	// footer
	echo $pageLauncher->getFooter();