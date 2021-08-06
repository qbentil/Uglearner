<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Feedbacks ","Questions", "Feedbacks");

	require_once "apps/feedbacks.php";






	// footer
	echo $pageLauncher->getFooter();