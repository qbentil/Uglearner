            <!-- Card END -->
			<div class="row">
                <form method="post" class="edit-course m-b30 add_faculty" enctype="multipart/form-data">
                    <div class="ajax-message"></div>
                    <div class="container rounded bg-white">
                        <div class="row">
                            <div class="col-lg-4 col-md-5 col-sm-12">
                                <div class="col-sm-12  ml-auto">
                                    <h6 class="text-primary">1. Department Logo / Icon</h6>
                                </div>
                                <div class="profile-bx text-center">
                                    <div class="user-profile-thumb">
                                        <img src="../assets/images/schools/deficon.png" id="preview" class=" imagePreview" alt=""/>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control image-preview-filename image-preview py-3" placeholder = "No image selected" style="cursor: pointer !important" readonly>
                                        <span class="input-group-btn">
                                            <!-- image-preview-input -->
                                            <div class="image-preview-input btn">
                                                <span class="fa fa-upload"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file"  class="form-control" name="logo" id="logo" accept="image/*"   />
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-12">
                                <div class="widget-inner">
                                        <div class="">
                                            <div class="form-group row">
                                                <div class="col-sm-12  ml-auto">
                                                    <h6 class="text-primary">2. Department Details</h6>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Name</label>
                                                <div class="col-sm-8">
                                                          <input class="form-control" type="text" name="name">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Description</label>
                                                <div class="col-sm-8">
                                                    <textarea  class="form-control" name="description" cols="30" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                          <input class="form-control" type="email" name="email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Address</label>
                                                <div class="col-sm-8">
                                                    <textarea  class="form-control" name="address" cols="30" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 ml-auto">
                                                    <h6 class="m-form__section text-primary">3. Social Links</h6>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Facebook</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="fbl" type="text" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Twitter</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="twl" type="text" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Telegram</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="tgl" type="text">
                                                </div>
                                            </div>
                                            
                                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x mb-3"></div>

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
                                                                <input type="file"  class="form-control" name="featured_img" id="featured_image"/>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>        
                                                <div class="">
                                                <div class="">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <button type="submit" class="btn" id="add_faculty_btn">Add Course</button>
                                                            <button type="reset" class="btn-secondry image-preview-alt-clear image-preview-clear">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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