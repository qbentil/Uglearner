<!-- Card END -->
			<div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 col-12 m-b30">
					<div class="widget">
						<!-- <h6 class="widget-title">Search</h6> -->
						<div class="search-bx style-1">
							<form  class="search-public-contact" autocomplete="off" method="post">
								<div class="input-group">
									<input class="form-control" id="contact-search-input" name = "query" placeholder="Search for message" type="text">
									<span class="input-group-btn">
										<button type="submit" class="fa fa-search text-primary"></button>
									</span> 
								</div>
							</form>
						</div>
					</div>
					<div class="widget-box">
						<div class="widget-inner">
							<div class="noti-box-list">
								<ul id="public-contacts">
									<?php 	
										$contacts = new pContacts();
										$fetch_rule = "ORDER BY `date` DESC";
										$contacts = $contacts->get_contacts($fetch_rule);
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
            </div>
            <div class="col-lg-1"></div>
        </div>
	</main>
	<div class="ttr-overlay"></div>