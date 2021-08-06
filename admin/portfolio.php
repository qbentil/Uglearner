<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Portfolio","Portfolio", "Manage");

	require_once "apps/portfolio.php";






	// footer
	echo $pageLauncher->getFooter();