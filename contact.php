<?php

	require "util/Pagelauncher.php";
	
	// require "admin/core/contacts.php";
	// $cont = new Contacts();
	$pageLauncher = new PageLauncher();

	// Get header
	$pageLauncher->getHead("Contact");

?>
<div class="page-wraper">
<div id="loading-icon-bx"></div>

	<!-- Header Top ==== -->
	<?php $pageLauncher->getNavbar() ?>
    <!-- Header Top END ==== -->

    <div class="page-content bg-white">
        <!-- inner page banner -->
		<?php
			$pageLauncher->get_banner("Contact Us", "banner3");
			require "contents/contact/index.php";

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
