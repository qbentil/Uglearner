<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Review Question","Review Question", "1234");

	require_once "apps/question.php";






	// footer
	echo $pageLauncher->getFooter();