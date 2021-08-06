<?php
	require "util/Pagelauncher.php";

	$pageLauncher = new PageLauncher();
	// Get header
	$pageLauncher->getHead("Blogger");

?>
<div class="page-wraper">
<div id="loading-icon-bx"></div>
	<!-- Header Top ==== -->
	<?php $pageLauncher->getNavbar() ?>
    <!-- Header Top END ==== -->

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
		<?php
			$pageLauncher->get_banner("UGLearner Blogs");
			require "contents/events/index.php";
		?>

    </div>
    <!-- Content END-->
	<!-- Footer ==== -->
	<?php
		$pageLauncher->getFooter();
	?>
    <!-- Footer END ==== -->

</div>
</body>

</html>
