<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Departments | Add","Departments", "New Department");

	require_once "apps/add-faculty.php";




	// footer
	echo $pageLauncher->getFooter();