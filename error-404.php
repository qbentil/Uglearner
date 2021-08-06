<?php
	require "util/Pagelauncher.php";

	$pageLauncher = new PageLauncher();

	// Get header
	$pageLauncher->getHead("Page not Found");

?>
<div class="page-wraper">
	<div id="loading-icon-bx"></div>
		<!-- Header Top ==== -->
		<?php // $pageLauncher->getNavbar() ?>
    <!-- Header Top END ==== -->
	<div class="account-form pt-5">
		<div class="account-form-inner">
			<div class="account-container">
				<div class="error-page">
					<h3>Ooopps :(</h3>
					<h2 class="error-title">404</h2>
					<h5>The Page you were looking for, couldn't be found.</h5>
					<p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
					<div class="">
						<!-- <a href="index.html" class="btn m-r5">Preview</a> -->
						<a href="./" class="btn outline black">Back To Home</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- Footer ==== -->
	<?php
		require "util/scripts.php";
	?>
    <!-- Footer END ==== -->

</body>

</html>
