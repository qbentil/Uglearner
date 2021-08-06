<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("New Administrator","Administrators", "Add new");

	require_once "apps/newAdmin.php";






	// footer
	echo $pageLauncher->getFooter();