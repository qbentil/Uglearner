<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Community","Community Portfolio", "New Executive");

	require_once "apps/new-member.php";






	// footer
	echo $pageLauncher->getFooter();