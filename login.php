<?php
// session_start();
if (session_status() !== PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['user_session']))
{
	header("location: ./admin/");
}
	require "auth/Auth.php";

	$pageLauncher = new Auth();

	// Get header
	$pageLauncher->getHead("Login");
	$pageLauncher->getForm("signin");
?>

<?php require "util/scripts.php" ?>
</body>

</html>
