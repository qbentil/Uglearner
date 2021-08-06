<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Compose Email","Email", "Compose");

	require_once "apps/mail-compose.php";






	// footer
	echo $pageLauncher->getFooter();