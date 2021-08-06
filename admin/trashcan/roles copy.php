			<!-- Card END -->
			<div class="row">
				<div class="col-md-6 col-lg-12 col-xl-12 col-sm-12 col-12">
									<!-- Your Profile Views Chart -->
				<table id="dataTable" class="display">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Date Added</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Examiner</td>
							<!-- <td>Examiner</td> -->
							<td>2011/01/25</td>
							<td>
                                <a href="javascript:;" class="btn btn-sm" data-target="#role1" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne"><i class="ti-pencil-alt"></i></a>
                                <a href="javascript:;" class="btn btn-sm" data-toggle="modal" data-target="#roleDetails"><i class="ti-info-alt"></i></a>
                                <a href="javascript:;" class="btn btn-sm"><i class="ti-trash"></i></a>
                            </td>
						</tr>
						<tr>
							<td>2</td>
							<td>Super Admin</td>
							<!-- <td>Examiner</td> -->
							<td>2021/01/20</td>
							<td>
                                <a href="javascript:;" class="btn btn-sm" data-target="#editAdminRole" data-toggle="modal" aria-expanded="true" aria-controls="collapseOne"><i class="ti-pencil-alt"></i></a>
                                <a href="javascript:;" class="btn btn-sm" data-toggle="modal" data-target="#roleDetails"><i class="ti-info-alt"></i></a>
                                <a href="javascript:;" class="btn btn-sm"><i class="ti-trash"></i></a>
                            </td>
							<div id="role2" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body">
									<div class="row placeani">
										<div class="col-lg-8 col-md-7 col-sm-12">
											<form action="#" method="post">
												<div class="widget-inner">
													<div class="">
														<div class="form-group row">
															<div class="col-sm-12  ml-auto">
																<h3 class="text-primary">Edit Role 2</h3>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-sm-4 col-form-label">Role Name</label>
															<div class="col-sm-8">
																<input class="form-control" type="text"  value="Super Admin">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-sm-4 col-form-label">Description</label>
															<div class="col-sm-8">
																<input class="form-control" type="text" value="Super admin is a role......">
															</div>
														</div>
													</div>
													<div class="">
														<div class="">
															<div class="row">
																<div class="col-sm-4">
																</div>
																<div class="col-sm-8">
																	<button type="submit" class="btn">Save changes</button>
																	<button type="reset" data-target="#role2" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne" class="btn-secondry">Cancel</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>