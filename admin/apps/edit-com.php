<?php

    $vcom = new vCommunity();
    if(!isset($_GET['id'])) echo "<script> location.href = \"communities.php\"; </script>";  //check for link validity

    $com = $vcom->community_data($_GET['id']);
    if(!is_array($com)) echo "<script> location.href = \"communities.php\"; </script>"; 

?>

			<!-- Card END -->
			<div class="row">
                <form method="post" class="edit-course m-b30" enctype="multipart/form-data">
                    <div class="container rounded bg-white">
                        <div class="row">
                            <div class="col-lg-4 col-md-5 col-sm-12">
                                <form class="edit-course m-b30" method="post" enctype="multipart/form-data">
                                    <div class="col-sm-12  ml-auto">
                                        <h6 class="text-primary">1. COmmunity Logo</h6>
                                    </div>
                                    <div class="profile-bx text-center">
                                        <div class="user-profile-thumb">
                                            <img src="../assets/images/communities/<?php echo $com['logo'] ?>" id="preview" class=" imagePreview" alt=""/>
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
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-12">
                                <div class="widget-inner">
                                        <div class="">
                                            <form class="edit-course m-b30" method="post" enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <div class="col-sm-12  ml-auto">
                                                        <h6 class="text-primary">2. Community Details</h6>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Faculty</label>
                                                    <div class="col-sm-8">
                                                        <select name="faculty" id="faculty"  class="form-control custom-select" required>
                                                            <?php $vcom->faculty_list($com['cid'])  ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Name</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="text" name="name" value="<?php echo $com['name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Slug</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="text" name="slug" value="<?php echo $com['slug'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="email" name="email" value="<?php echo $com['email'] ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Description</label>
                                                    <div class="col-sm-8">
                                                        <textarea  class="form-control" name="description" id="" cols="30" rows="5"><?php echo $com['about'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn">Save</button>
                                                        <button type="reset" class="btn-secondry">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <form class="edit-course m-b30" method="post">
                                                <div class="form-group row">
                                                    <div class="col-sm-12 ml-auto">
                                                        <h6 class="m-form__section text-primary">3. Social Links</h6>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Facebook</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="text" name="facebook" value="<?php echo $com['facebook'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Twitter</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="text" name="twitter" value="<?php echo $com['twitter'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Instagram</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="text" name="instagram" value="<?php echo $com['instagram'] ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn">Save</button>
                                                        <button type="reset" class="btn-secondry">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x mb-3"></div>

                                            <form class="edit-course m-b30" method="post" enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <div class="col-sm-12  ml-auto">
                                                        <h6 class="text-primary">4. Featured image</h6>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Image</label>
                                                    <div class="form-group col-sm-8">
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
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn">Save</button>
                                                        <button type="reset" class="btn-secondry image-preview-alt-clear image-preview-clear">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</main>
	<div class="ttr-overlay"></div>