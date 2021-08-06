<?php
	require "util/Pagelauncher.php";
	// require "controllers/views/views.php";
	$_SESSION['nav-logo'] = "logo-white";
	$pageLauncher = new PageLauncher();

	// Get header
	$pageLauncher->getHead("Welcome");

?>
<div class="page-wraper">
<!-- <div id="loading-icon-bx"></div> -->
	<!-- Header Top ==== -->
	<?php $pageLauncher->getNavbar("header-transparent") ?>
    <!-- Header Top END ==== -->
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- Main Slider -->
		<?php $pageLauncher->getSliders() ?>
        <!-- Main Slider -->
		<div class="content-block">
            
			<!-- Our Services  //showcase programs-->
			<?php $pageLauncher->getShowcase() ?>
            <!-- Our Services //showcase programs END -->

			<!-- Home Page Content-->
			<?php $pageLauncher->homepage_content() ?>
			<!-- Home Page Content END-->
			
        </div>
		<!-- contact area END -->
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
