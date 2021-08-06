<?php
	require "util/Pagelauncher.php";

	$pageLauncher = new PageLauncher();

	// Get header
	$pageLauncher->getHead("Communities");

?>
<div class="page-wraper">
<!-- <div id="loading-icon-bx"></div> -->

	<!-- Header Top ==== -->
	<?php $pageLauncher->getNavbar() ?>
    <!-- Header Top END ==== -->
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
		<?php
			$pageLauncher->get_banner("Communities / Student Associations", "banner2")
		?>
		<!-- Breadcrumb row END -->
        <!-- inner page banner END -->
		<div class="content-block">
            <!-- About Us -->
		<?php
			require "contents/communities/index.php";
		?>
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
<!-- External JavaScripts -->


</html>
