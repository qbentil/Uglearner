<?php
	require "util/Pagelauncher.php";

	$pageLauncher = new PageLauncher();

	// Get header
	$pageLauncher->getHead("Course | ".ucwords(str_replace("-", " ", $_GET['q'])));

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
			$pageLauncher->get_banner(ucwords(str_replace("-", " ", $_GET['q'])), "banner1");
			require "contents/course/index.php";
		?>
		<!-- Breadcrumb row END -->
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
