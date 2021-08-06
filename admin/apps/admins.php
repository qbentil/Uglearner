			<!-- Card END -->
			<div class="row">
				<div class="col-md-6 col-lg-12 col-xl-12 col-sm-12 col-12">
									<!-- Your Profile Views Chart -->
				<table id="dataTable" class="display">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Role</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php 	
						$contacts = new vAdmins();
						$contacts->fetch_admins();
					?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>