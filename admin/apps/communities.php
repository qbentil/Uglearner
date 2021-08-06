
			<!-- Card -->
				<!-- Include community statistics here -->
			<!-- Card END -->
			<div class="row">
				<div class="col-md-6 col-lg-12 col-xl-12 col-sm-12 col-12">
									<!-- Your Profile Views Chart -->
				<table id="dataTable" class="display">
					<thead>
						<tr>
							<th>Name</th>
							<th>Slug</th>
							<th>Email</th>
							<th>Connect</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 	
							$contacts = new vCommunity();
							// $fetch_rule = "ORDER BY `date` DESC";
							$contacts = $contacts->fetch_communities();
						?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>