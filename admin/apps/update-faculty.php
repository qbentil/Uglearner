<?php

    $vFaculty = new vFaculty();
    if(!isset($_GET['id'])) echo "<script> location.href = \"faculties.php\"; </script>";  //check for link validity

    $faculty = $vFaculty->faculty_data($_GET['id']);
    if(!is_array($faculty)) echo "<script> location.href = \"faculties.php\"; </script>"; // Check for Faculty info

?>


<!-- Card END -->
			<div class="row">
                <div class="container rounded bg-white">
                    <div class="row">
                        <div class="col-lg-4 col-md-5 col-sm-12">
                        <div class="profile-bx text-center">
                            <form method="post" class="update_faculty" enctype="multipart/form-data">
                                <div class="user-profile-thumb">
                                    <img src="assets/images/schools/<?php echo $faculty['logo'] ?>" id="preview" class=" imagePreview" alt="logo"/>
                                </div>
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
                                <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <button type="submit" class="btn btn-block">Save</button>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <button type="reset" class="btn-secondry  btn-block image-preview-clear">Cancel</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-12">
                            <div class="widget-inner">
                                <form class="edit-profile m-b30 update_faculty" method="POST">
                                    <div class="ajax-message"></div>
                                    <div class="">
                                        <div class="form-group row">
                                            <div class="col-sm-12  ml-auto">
                                                <h3 class="text-primary">2. Course Details</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Name</label>
                                                <div class="col-sm-8">
                                                          <input class="form-control" type="text" name="name" value="<?php echo $faculty['name'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Description</label>
                                                <div class="col-sm-8">
                                                    <textarea  class="form-control" name="description" cols="30" rows="3" ><?php echo $faculty['description'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="email" name="email" value="<?php echo $faculty['email'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Address</label>
                                                <div class="col-sm-8">
                                                    <textarea  class="form-control" name="address" cols="30" rows="3"><?php echo $faculty['address'] ?></textarea>
                                                </div>
                                            </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-8">
                                                <button type="submit" class="btn">Save</button>
                                                <button type="reset" class="btn-secondry">Cancel</button>
                                            </div>
                                        </div>
                                </form>
                                <form class="edit-profile m-b30 update_faculty" method="POST">
                                        <div class="form-group row">
                                            <div class="col-sm-12 ml-auto">
                                                <h3 class="m-form__section text-primary">3. Social Links</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Facebook</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" value="www.facebook.com/">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Twitter</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" value="www.twitter.com/">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Telegram</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" value="www.telegram.com/">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-8">
                                            <button type="submit" class="btn">Save</button>
                                            <button type="reset" class="btn-secondry">Cancel</button>
                                        </div>
                                    </div>
                                <div class="seperator mb-4"></div>
                            </form>
                                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x mb-3"></div>
                                        <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-sm-12  ml-auto">
                                                <h3 class="text-primary">4. Featured Images</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Image</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control image-preview-alt-filename image-preview-alt py-3" placeholder = "No image selected" style="cursor: pointer !important" readonly>
                                                    <span class="input-group-btn">
                                                        <!-- image-preview-alt-input -->
                                                        <div class="image-preview-alt-input btn">
                                                            <span class="fa fa-upload"></span>
                                                            <span class="image-preview-alt-input-title">Browse</span>
                                                            <input type="file"  class="form-control" name="img" required />
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>        
                                            <div class="">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button type="submit" class="btn">Save</button>
                                                        <button type="reset" class="btn-secondry image-preview-alt-clear">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</main>
	<div class="ttr-overlay"></div>