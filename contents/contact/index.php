        <!-- inner page banner -->
        <div class="page-banner contact-page section-sp2">
            <div class="container">
                <div class="row">
                    <?php
                        require "info.php";
                        ?>
                        <div class="col-lg-7 col-md-7">
                        <?php 
							$pages = new PageLauncher();
							echo $pages->form("contact_form");
						?>
                    </div>
				</div>
            </div>
		</div>
        <!-- inner page banner END -->