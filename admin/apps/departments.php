			<!-- Card END -->
			<div class="row">
				<div class="col-md-6 col-lg-12 col-xl-12 col-sm-12 col-12">
									<!-- Your Profile Views Chart -->
				<table id="dataTable" class="display">
					<thead>
						<tr>
							<th>Name</th>
							<!-- <th>Address</th> -->
							<th>Email</th>
							<th>Connect</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 	
							$faculties = new vFaculty();
							// $fetch_rule = "ORDER BY `date` DESC";
							$faculties = $faculties->fetch_faculties();
						?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>