
	<form class="contact-bx" id="contact_us"   method="POST" autocomplete="off">
	<div class="ajax-message"></div>
		<div class="heading-bx left">
			<h2 class="title-head">Get In <span>Touch</span></h2>
			<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
		</div>
		<div class="row placeani">
			<div class="col-lg-6">
				<div class="form-group">
					<div class="input-group">
						<label>Your Name <span class="text-danger">*</span></label>
						<input name="name" type="text" class="form-control valid-character" >
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<div class="input-group"> 
						<label>Your Email Address <span class="text-danger">*</span></label>
						<input name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control " >
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<div class="input-group">
						<label>Your Phone <span class="text-danger">*</span></label>
						<input name="phone" maxlength="10" type="text" class="form-control int-value" >
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<div class="input-group">
						<label>Subject <span class="text-danger">*</span></label>
						<input name="subject" type="text" class="form-control valid-character" >
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<div class="input-group">
						<label>Type Message <span class="text-danger">*</span></label>
						<textarea name="message" rows="4" class="form-control" ></textarea>
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
				<button name="submit" type="submit" value="Submit" class="btn button-md" id="contact_btn"> Send Message</button>
			</div>
		</div>
	</form>