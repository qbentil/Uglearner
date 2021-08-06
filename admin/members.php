<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Community","Community Portfolio", "Manage Executives");

	require_once "apps/members.php";




	// footer
	echo $pageLauncher->getFooter();