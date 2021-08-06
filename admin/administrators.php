<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Administrators","Administrators", "Manage");

	require_once "apps/admins.php";




	// footer
	echo $pageLauncher->getFooter();