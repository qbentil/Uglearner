<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<div class="row">
								<div class="col-md-10">
									<h4>Add MCQ Questions</h4>
								</div>
								<div class="col-md-2">
									<button type="button" class="btn yellow text-white upload outline m-r5" data-toggle="modal" data-target="#uploadQuestion"><i class="fa fa-fw fa-upload"></i>Upload</button>
								</div>
							</div>
						</div>
						<div class="widget-inner">
							<form class="" method="POST" autocomplete="off">
								<div class="row">									
									<div class="col-12">
										<table id="item-add" style="width:100%;">
											<tr class="list-item">
												<td class=" px-2">
												<div class="row">
														<div class="col-md-12">
															<label class="col-form-label">Questions</label>
															<div>
																<textarea name="question[]" class="form-control" placeholder="Whatst is........"></textarea>
															</div>
														</div>
														<div class="col-md-6">
															<label class="col-form-label">Option 1</label>
															<div>
																<input class="form-control" name="option-1[]" type="text" placeholder="">
															</div>
														</div>
														<div class="col-md-6">
															<label class="col-form-label">Option 2</label>
															<div>
																<input class="form-control" name="option-2[]" type="text" placeholder="">
															</div>
														</div>
														<div class="col-md-6">
															<label class="col-form-label">Option 3</label>
															<div>
																<input class="form-control" name="option-3[]" type="text" placeholder="">
															</div>
														</div>
														<div class="col-md-6">
															<label class="col-form-label">Option 4</label>
															<div>
																<input class="form-control" name="option-4[]" type="text" placeholder="">
															</div>
														</div>
														<div class="col-md-1">
															<label class="col-form-label">Answer</label>
															<div>
																<input class="form-control" name="answer[]" type="text" placeholder="1">
															</div>
														</div>
														<div class="col-md-10">
															<label class="col-form-label">Reason</label>
															<div>
																<input class="form-control" name="desription[]" type="text" placeholder="Because.......">
															</div>
														</div>
														<div class="col-md-1">
															<label class="col-form-label">Close</label>
															<div class="form-group">
																<button class="delete" title="Delete Question" type="reset"><i class="fa fa-close"></i></button>
															</div>
														</div>
													</div>
												</td>
											</tr>
										</table>
									</div>
									<div class="col-12">
										<button type="button" class="btn green add-item m-r5"><i class="fa fa-fw fa-plus-circle"></i>Add Item</button>
										<button type="submit" class="btn">Save changes</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>