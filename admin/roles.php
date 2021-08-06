<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("User Roles","Roles", "Manage");

	require_once "apps/roles.php";


	// footer
	echo $pageLauncher->getFooter();