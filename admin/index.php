<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();

	// Page Start.
	echo $pageLauncher->launchPage("Welcome ", "Home", $pageLauncher->user()['name']);

	require_once "apps/home/index.php";






	// footer
	echo $pageLauncher->getFooter();