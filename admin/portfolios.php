<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Communities","Student Communities", "Portfolios");

	require_once "apps/portfolios.php";






	// footer
	echo $pageLauncher->getFooter();