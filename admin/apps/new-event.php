			<!-- Card END -->
			<div class="row">
                <div class="container rounded bg-white">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">

                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="widget-inner">
                                <form class="edit-profile event_form m-b30">
                                    <div class="ajax-message"></div>
                                    <div class="">
                                        <div class="form-group row">
                                            <div class="col-sm-12  ml-auto">
                                                <h3 class="text-primary">1. Event Details</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Event name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" name="e_name" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Description</label>
                                            <div class="col-sm-8">
                                                <!-- <input class="form-control" type="text" > -->
                                                <textarea  cols="30" rows="10" class="form-control" name="e_description" placeholder="Describe event"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Flyer / Banner</label>
                                                <div class="form-group col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control image-preview-alt-filename image-preview-alt py-3" placeholder = "No image selected" style="cursor: pointer !important" readonly>
                                                        <span class="input-group-btn">
                                                            <!-- image-preview-alt-input -->
                                                            <div class="image-preview-alt-input btn">
                                                                <span class="fa fa-upload"></span>
                                                                <span class="image-preview-alt-input-title">Browse</span>
                                                                <input type="file" name="e_flyer" id="f_image"  class="form-control" required />
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                        </div>    
                                        <div class="seperator"></div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Rate</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" name="e_rate" type="number" >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Venue</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="e_venue" placeholder="5-S2-20 Dummy City, Conference Hall">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <div class="form-group row">
                                            <div class="col-sm-12  ml-auto">
                                                <h3 class="text-primary">2. Event Duration</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-5">
                                                <input type="datetime-local" id="from" name="e_dstart" class="form-control">
                                            </div>
                                            <div class="col-sm-1">
                                                <span class="btn disabled">TO</span>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="datetime-local" id="to" name="e_dend" class="form-control">
                                            </div>
                                        </div>
    
                                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                    </div>
                                    <div class="">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                </div>
                                                <div class="col-sm-2 col-md-3">
                                                    <button type="submit" class="btn" id="add_event_btn">Save changes</button>
                                                </div>
                                                <div class="col-sm-2 col-md-3">
                                                    <button type="reset" class="btn-secondry">Cancel</button>
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
	</main>
	<div class="ttr-overlay"></div>