<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("New MCQ","MCQ", "Add New");

	require_once "apps/newmcq.php";




	// footer
	echo $pageLauncher->getFooter();