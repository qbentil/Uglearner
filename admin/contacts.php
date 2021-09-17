<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	// echo $pageLauncher->launchPage("Public Contacts ","Contacts", "All");
	$checker =  isset($_GET['access'])? true:false;
	if(!$checker){
		echo $pageLauncher->launchPage("Public Contacts","Notifications", "(Other Admins can see and respond)");
		require_once "apps/public-contacts.php";
	}else{
		echo $pageLauncher->launchPage("Private Notifications ","Notifications", "(Only you can see and respond)");
		require_once "apps/private-contacts.php";
	}






	// footer
	echo $pageLauncher->getFooter();