<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Question","Question", "Review");

	require_once "apps/questions.php";






	// footer
	echo $pageLauncher->getFooter();