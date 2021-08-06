<?php
    $id = $_SESSION['user_session'];
    $users = new Administrator("../");
	$user = $users->singlerecord($id);
?> 

<div class="row">
				<div class="col-lg-4 col-md-5 col-sm-12">
					<div class="profile-bx text-center">
						<form method="post" class="update-profile edit-profile"  enctype="multipart/form-data">
							<div class="ajax-message"></div>
							<div class="user-profile-thumb">
								<img src="assets/images/users/<?php echo $user['photo'] ?>" id="preview" class=" imagePreview" alt=""/>
							</div>
							<div class="input-group">
								<input type="text" class="form-control image-preview-filename image-preview py-3" placeholder = "No image selected" style="cursor: pointer !important" readonly>
								<span class="input-group-btn">
									<!-- image-preview-input -->
									<div class="image-preview-input btn">
										<span class="fa fa-upload"></span>
										<span class="image-preview-input-title">Browse</span>
										<input type="file"  class="form-control" name="img" accept="image/*"   />
									</div>
								</span>
							</div>
							<div class="row">
									<div class="col-lg-6 col-md-6">
										<button type="submit" class="btn btn-block pf_btn">Save</button>
									</div>
									<div class="col-lg-6 col-md-6">
										<button type="reset" class="btn-secondry  btn-block image-preview-clear">Cancel</button>
									</div>
							</div>
						</form>
					</div>
				</div>
				<!-- Your Profile Views Chart -->
				<div class="col-lg-8 col-md-7 col-sm-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>User Profile</h4>
						</div>
						<div class="widget-inner">
							<form class="update-profile edit-profile m-b30" id="personal-info">
								<div class="ajax-message"></div>
									<div class="form-group row">
										<div class="col-sm-12  ml-auto">
											<h3>1. Personal Details</h3>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Full Name</label>
										<div class="col-sm-9">
											<input class="form-control" type="text" name="name" value="<?php echo $user['name'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Email</label>
										<div class="col-sm-9">
											<input class="form-control" type="text" name="email" value="<?php echo $user['email'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Phone </label>
										<div class="col-sm-9">
											<input class="form-control" type="text" name="phone" value="<?php echo $user['phone'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Role</label>
										<div class="col-sm-9">
											<input class="form-control" type="text" value="<?php echo $users->admin_role($user['rid'])['name']?>" readonly>
											<span class="help"><?php echo $users->admin_role($user['rid'])['description'] ?></span>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
										</div>
										<div class="col-sm-9">
											<button type="submit" class="btn pf_btn">Save changes</button>
											<button type="reset" class="btn-secondry">Cancel</button>
										</div>
									</div>
							</form>

							<form class="update-profile edit-profile m-b30 mt-3">
								<div class="ajax-message"></div>
									<div class="form-group row">
										<div class="col-sm-12 ml-auto">
											<h3 class="m-form__section">3. Social Links</h3>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Linkedin</label>
										<div class="col-sm-9">
											<input class="form-control" type="text" name="u_linkedin" value="<?php echo $user['linkedin'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Facebook</label>
										<div class="col-sm-9">
											<input class="form-control" type="text" name="u_facebook" value="<?php echo $user['facebook'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Twitter</label>
										<div class="col-sm-9">
											<input class="form-control" type="text" name="u_twitter" value="<?php echo $user['twitter'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Instagram</label>
										<div class="col-sm-9">
											<input class="form-control" type="text" name="u_instagram" value="<?php echo $user['instagram'] ?>">
										</div>
									</div>
								<div class="row">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-9">
										<button type="button" class="btn pf_btn">Save changes</button>
										<button type="reset" class="btn-secondry">Cancel</button>
									</div>
								</div>
							</form>
							<form class="update-profile edit-profile mt-4">
								<div class="ajax-message"></div>
								<div class="">
									<div class="form-group row">
										<div class="col-sm-12 ml-auto">
											<h3>4. Password</h3>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Current Password</label>
										<div class="col-sm-9">
										<div class="input-group">
											<input class="form-control" type="password" autocomplete="off" name="cu_password">
											<div class="btn input-group-append" id="pshow">
												<span class="fa fa-eye"></span>
											</div>
										</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">New Password</label>
										<div class="col-sm-9">
											<input class="form-control" type="password" autocomplete="off" name="nu_password">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Re Type Password</label>
										<div class="col-sm-9">
											<input class="form-control" type="password" autocomplete="off" name="ru_password">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-9">
										<button type="submit" class="btn pf_btn">Save changes</button>
										<button type="reset" class="btn-secondry">Cancel</button>
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