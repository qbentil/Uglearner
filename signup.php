<?php
	header("location: ./"); // Prevent users from signup page
	require "auth/Auth.php";

	$pageLauncher = new Auth();

	// Get header
	$pageLauncher->getHead("Signup");
	$pageLauncher->getForm("signup");
?>

<?php require "util/scripts.php" ?>
</body>

</html>
