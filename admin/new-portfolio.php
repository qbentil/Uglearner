<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Communities","Community Portfolio", "New Portfolio");

	require_once "apps/newportfolio.php";






	// footer
	echo $pageLauncher->getFooter();