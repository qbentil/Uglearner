<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Communities","Edit Community", "Community Name");

	require_once "apps/edit-com.php";






	// footer
	echo $pageLauncher->getFooter();