<?php
	require "util/Pagelauncher.php";

	$pageLauncher = new PageLauncher();

	// Get header
	$pageLauncher->getHead("About");
	

?>
<div class="page-wraper">
	<div id="loading-icon-bx"></div>

	<!-- Header Top ==== -->
	<?php $pageLauncher->getNavbar() ?>
    <!-- Header Top END ==== -->

    <!-- Inner Content Box ==== -->
    <div class="page-content">
        <!-- Page Heading Box ==== -->
		<?php
			$pageLauncher->get_banner("About UGLearner", "banner1");

			require "contents/about/index.php";
		?>
    </div>
    <!-- Inner Content Box END ==== -->

	<!-- Footer ==== -->
	<?php
		$pageLauncher->getFooter();
	?>
    <!-- Footer END ==== -->
</div>

</body>


</html>
