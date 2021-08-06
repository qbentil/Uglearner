<?php
	require "utilities/PageLauncher.php";
	$pageLauncher = new PageLauncher();
	echo $pageLauncher->launchPage("Mailbox ","Mailbox", "Messages");

	require_once "apps/mailbox.php";






	// footer
	echo $pageLauncher->getFooter();