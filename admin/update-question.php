<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Update Question","Question", "Edit Question");

	require_once "apps/update-mcq.php";




	// footer
	echo $pageLauncher->getFooter();