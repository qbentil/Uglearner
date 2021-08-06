<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Community Portfolio","Update member record", "member name");

	require_once "apps/edit-member.php";




	// footer
	echo $pageLauncher->getFooter();