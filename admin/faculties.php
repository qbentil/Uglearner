<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Department Management","Departments", "Manage");

	require_once "apps/departments.php";




	// footer
	echo $pageLauncher->getFooter();