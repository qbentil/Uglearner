<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("User Roles","User", "Edit Role");

	require_once "apps/manageAdmin.php";






	// footer
	echo $pageLauncher->getFooter();