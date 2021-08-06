        <!-- contact area -->
        <div class="content-block">
            <!-- Your Faq -->
            <div class="section-area section-sp1">
                <div class="container">
					<div class="row">
                        <?php
                            require "faqs.php";
                            ?>
                            <div class="col-lg-4 col-md-12">
                            <?php 
                                $pages = new PageLauncher();
                                echo $pages->form("contact_form");
                            ?>
                            </div>
					</div>
					
                </div>
            </div>
            <!-- Your Faq End -->
        </div>
		<!-- contact area END -->