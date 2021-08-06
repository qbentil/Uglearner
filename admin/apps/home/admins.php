<div class="col-lg-5 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Administrators</h4>
						</div>
						<div class="widget-inner">
							<div class="new-user-list">
								<ul>
								<?php 	
									$contacts = new vAdmins();
									// $fetch_rule = "ORDER BY `date` DESC";
									$contacts->featured_admins();
								?>
								</ul>
							</div>
						</div>
					</div>
				</div>