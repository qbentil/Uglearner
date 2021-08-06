<?php

    $vAdmin = new vAdmins();
    if(!isset($_GET['id'])) echo "<script> location.replace(\"administrators.php\"); </script>";  //check for link validity

    $admin = $vAdmin->admin_data($_GET['id']);
    if(!is_array($admin)) echo "<script> location.replace(\"administrators.php\"); </script>"; 

?>

<div class="row">
                <div class="container rounded bg-white">
                    <div class="row">
                        <?php echo $vAdmin->profile_card($_GET['id']) ?>
                        <div class="col-lg-8 col-md-7 col-sm-12">
                            <div class="widget-inner">
                                <div class="">
                                    <form method="post"  class="edit-profile m-b30" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-12  ml-auto">
                                            <h3 class="text-primary">1. Profile </h3>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Picture</label>
                                        <div class="col-sm-8 row">
                                            <div class="input-group">
                                                <input type="text" class="form-control image-preview-filename image-preview py-3" placeholder = "No image selected" style="cursor: pointer !important" readonly>
                                                <span class="input-group-btn">
                                                    <!-- image-preview-input -->
                                                            <div class="image-preview-input btn">
                                                                <span class="fa fa-upload"></span>
                                                                <span class="image-preview-input-title">Browse</span>
                                                                <input type="file"  class="form-control" name="img" required />
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <button type="submit" class="btn btn-block">Update Picture</button>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <button type="reset" class="btn-secondry  btn-block image-preview-clear">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form class="edit-profile m-b30">
                                            <div class="form-group row">
                                                <div class="col-sm-12  ml-auto">
                                                    <h3 class="text-primary">2. Personal Details </h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Full Name</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" value="<?php echo $admin['name'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Phone No.</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" value="<?php echo $admin['phone'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="email" value="<?php echo $admin['email'] ?>" disabled>
                                                </div>
                                            </div>
                                            
                                            <div class="seperator"></div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <button class="btn">Save changes</button>
                                                    <button type="reset" class="btn red outline">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                            </div>
                            <div class="widget-inner">
                                <form class="edit-profile m-b30">
                                    <div class="">
                                        <div class="form-group row">
                                            <div class="col-sm-12  ml-auto">
                                                <h3 class="text-primary text-left">3. Role</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Role</label>
                                            <div class="col-sm-8">
                                                <select name="role" id="role-select"  class="form-control ">
                                                    <?php $vAdmin->roles_list($admin['rid'])  ?>
                                                </select>
                                            </div>
                                        </div>
                                        <h3 class="text-primary text-left"><small class="text-primary">Role Description</small></h3>
                                        <div class="form-froup row">
                                            <div class="card">
                                                <div class="card-body" id="selected-role-desc">
                                                    <?php echo $vAdmin->role($admin['rid'])['description']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="row mt-4">
										<div class="col-sm-12">
											<button class="btn">Save changes</button>
											<button type="reset" class="btn red outline">Cancel</button>
										</div>
									</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</main>
	<div class="ttr-overlay"></div>