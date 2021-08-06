<form class="contact-bx ajax-form" action="" autocomplete="off">
									<div class="ajax-message"></div>
										<div class="heading-bx left">
											<h2 class="title-head">Send <span>Feedback</span></h2>
											<p>Anything in mind about the course, Let's hear you out.</p>
										</div>
										<div class="row placeani">
											<div class="col-lg-6">
												<div class="form-group">
													<div class="input-group">
														<label>Your Name</label>
														<input name="name" type="text" required class="form-control valid-character">
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<div class="input-group"> 
														<label>Your Email Address</label>
														<input name="email" type="email" class="form-control" required >
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<div class="input-group">
														<label>Your Phone</label>
														<input name="phone" type="text" required class="form-control int-value">
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<div class="input-group">
														<label>Subject</label>
														<input name="subject" type="text" required class="form-control">
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<div class="input-group">
														<label>Type Message</label>
														<textarea name="message" rows="4" class="form-control" required ></textarea>
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<div class="input-group">
														<div class="g-recaptcha" data-sitekey="6Lf2gYwUAAAAAJLxwnZTvpJqbYFWqVyzE-8BWhVe" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
														<input class="form-control d-none" style="display:none;" data-recaptcha="true" required data-error="Please complete the Captcha">
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<button name="submit" type="submit" value="Submit" class="btn button-md"> Send Message</button>
											</div>
										</div>
									</form>