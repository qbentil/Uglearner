			<!-- Card END -->
			<div class="row">
				<div class="col-md-6 col-lg-12 col-xl-12 col-sm-12 col-12">
									<!-- Your Profile Views Chart -->
				<table id="dataTable" class="display">
					<thead>
						<tr>
							<th>Course ID</th>
							<th>Title</th>
							<th>Level of Study</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 	
							$courses = new vCourses();
							$fetch_rule = "ORDER BY `tid` ASC";
							$courses->fetch_courses();
						?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>