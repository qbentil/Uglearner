<?php

    $vcourse = new vCourses();
    if(!isset($_GET['id'])) echo "<script> location.href = \"courses.php\"; </script>";  //check for link validity

    $course = $vcourse->course_data($_GET['id']);
    if(!is_array($course)) echo "<script> location.href = \"courses.php\"; </script>"; 

?>

			<!-- Card END -->
			<div class="row">
                <div class="container rounded bg-white">
                    <div class="row">
                        <div class="col-lg-4 col-md-5 col-sm-12">
                                <div class="profile-bx text-center">
                                    <form class="edit-course m-b30" method="post" enctype="multipart/form-data">
                                        <!-- <div class="user-profile-thumb">
                                            <img src="../assets/images/courses/<?php echo $course['photo'] ?>" id="preview" class=" imagePreview" alt=""/>
                                        </div> -->
                                        <div class="card-courses-media mb-2">
                                            <img src="../assets/images/courses/<?php echo $course['photo'] ?>" id="preview" class=" imagePreview" alt=""/>
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
                                    <form class="edit-profile m-b30">
                                        <div class="">
                                            <div class="form-group row">
                                                <div class="col-sm-12  ml-auto">
                                                    <h3 class="text-primary">1. Course Details</h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Course ID</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="tid" value="<?php echo $course['tid'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Course Title</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="title" value="<?php echo $course['title'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Description</label>
                                                <div class="col-sm-8">
                                                    <textarea  class="form-control" name="description" id="" cols="30" rows="5"><?php echo $course['description'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Level of Study</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" min="100" step="100"  max="400" type="number" name="level" value="<?php echo $course['level'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Language</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" value="<?php echo $course['language'] ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn">Save</button>
                                                    <button type="reset" class="btn-secondry">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- <form method="POST" class="edit-profile m-b30">
                                            <div class="seperator mt-5"></div>
                                            
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
                                                        <div class="image-preview-alt-input btn">
                                                            <span class="fa fa-upload"></span>
                                                            <span class="image-preview-alt-input-title">Browse</span>
                                                            <input type="file"  class="form-control" name="img" required />
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn">Save</button>
                                                <button type="reset" class="btn-secondry">Cancel</button>
                                            </div>
                                        </div>
                                    </form> -->
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
	</main>
	<div class="ttr-overlay"></div>