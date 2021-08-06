<?php
	require "util/Pagelauncher.php";

	$pageLauncher = new PageLauncher();

	$community = str_replace("-", " ", $_GET['q']);
	// $com = new Community();

    if (!isset($community)) {

        // echo "<script> location.replace(\"courses.php\"); </script>";
        echo "<script> window.history.back(); </script>";
    }
	// Get header
	$pageLauncher->getHead("Communities |".ucwords($community));

?>


<div class="page-wraper">
<!-- <div id="loading-icon-bx"></div> -->

	<!-- Header Top ==== -->
	<?php $pageLauncher->getNavbar() ?>
    <!-- Header Top END ==== -->

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <!-- inner page banner -->
		<?php
			$pageLauncher->get_banner(ucwords($community), "banner2");
			require "contents/community/index.php";
		?>
		<!-- Breadcrumb row END -->

		
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
