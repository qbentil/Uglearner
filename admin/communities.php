<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Communities","Student Communities", "Manage Communites");

	require_once "apps/communities.php";






	// footer
	echo $pageLauncher->getFooter();