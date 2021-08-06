			<!-- Card END -->
			<div class="row">
                <form method="post" class="edit-course m-b30" enctype="multipart/form-data">
                    <div class="container rounded bg-white">
                        <div class="row">
                            <div class="col-lg-4 col-md-5 col-sm-12">
                            <div class="profile-bx text-center">
                                <div class="user-profile-thumb">
                                    <img src="assets/images/testimonials/myself.jpg" id="preview" class=" imagePreview" alt=""/>
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
                            </div>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-12">
                                <div class="widget-inner">
                                        <div class="">
                                            <div class="form-group row">
                                                <div class="col-sm-12  ml-auto">
                                                    <h6 class="text-primary">2. Course Details</h6>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Course ID</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" value="Math 123">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Course Title</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" value="Vectors and Geometry">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Description</label>
                                                <div class="col-sm-8">
                                                    <textarea  class="form-control" name="description" id="" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Level of Study</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" min="100" step="100"  max="400" type="number" name="level" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Language</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" value="">
                                                </div>
                                            </div>

                                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x mb-3"></div>
                                            <div class="form-group row">
                                                <div class="col-sm-12  ml-auto">
                                                    <h6 class="text-primary">3. Featured image</h6>
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
                                                <div class="">
                                                <div class="">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <button type="submit" class="btn">Add Course</button>
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