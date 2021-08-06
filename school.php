<?php
	require "util/Pagelauncher.php";

	$pageLauncher = new PageLauncher();

	// check school
	$school_name = str_replace("-", " ", $_GET['q']);

    if (!isset($school_name)) {

        // echo "<script> location.replace(\"courses.php\"); </script>";
        echo "<script> window.history.back(); </script>";
    }

	// Get header
	$pageLauncher->getHead("Schools | ".ucwords($school_name));

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
			$pageLauncher->get_banner(ucwords($school_name), "banner2");
			require "contents/school/index.php";
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
