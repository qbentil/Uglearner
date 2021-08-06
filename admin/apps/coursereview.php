<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="row py-3">
							<div class="col-lg-6">
								<div class="wc-title">
									<h4>Reviews</h4>
								</div>
							</div>
							<div class="col-lg-4">
								<form action="#" method="post">
									<div class="form-group">
										<div class="input-group">
											<input type="text" name="" id="course_review_search" class="form-control" placeholder="search...">
											<div class="input-group-prepend">
												<span class="btn" id="basic-addon1"><i class="ti-search"></i></span>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="widget-inner" id="reviews-container">
							<?php 	
								$courses = new vCourses();
								$fetch_rule = "ORDER BY `status` ASC";
								$courses->review_courses($fetch_rule);
							?>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>