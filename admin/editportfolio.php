<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Edit Community Portfolio","Community Portfolio", "Edit Porfolio");

	require_once "apps/edit-portfolio.php";




	// footer
	echo $pageLauncher->getFooter();