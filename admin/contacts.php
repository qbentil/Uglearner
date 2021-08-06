<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Public Contacts ","Contacts", "All");

	require_once "apps/public-contacts.php";






	// footer
	echo $pageLauncher->getFooter();