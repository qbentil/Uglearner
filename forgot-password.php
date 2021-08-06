<?php
	require "auth/Auth.php";

	$pageLauncher = new Auth();

	// Get header
	$pageLauncher->getHead("Forgot Password");
	$pageLauncher->getForm("forgot");
?>

<?php require "util/scripts.php" ?>
</body>

</html>
