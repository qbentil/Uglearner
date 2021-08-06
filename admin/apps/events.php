			<!-- Card -->
			<?php  require "./includes/events-stats.php"  ?>
			<!-- Card END -->
			<div class="row">
				<div class="col-md-6 col-lg-12 col-xl-12 col-sm-12 col-12">
									<!-- Your Profile Views Chart -->
					<table id="dataTable" class="display">
						<thead>
							<tr>
								<th>Title</th>
								<th>Venue</th>
								<th>Start</th>
								<th>End</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php 	
							$contacts = new vEvents();
							// $fetch_rule = "ORDER BY `date` DESC";
							$contacts = $contacts->fetch_events();
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>