
		<div class="account-form-inner">
			<div class="account-container">
				<div class="heading-bx left">
					<h2 class="title-head">Login to your <span>Account</span></h2>
					<!-- <?php echo sha1("Admin123!") ?>  SYSTEM PASSWORD-->
					<p></p>
				</div>	
				<form class="contact-bx login-form" method="POST" autocomplete="off">
					<div class="ajax-message"></div>
					<div class="row placeani">
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Your Email</label>
									<input name="email" type="email" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label>Your Password</label>
									<input name="password" type="password" id="password" class="form-control" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group form-forget">
								<div class="custom-control custom-checkbox" >
									<input type="checkbox" class="custom-control-input" id="show-password">
									<label class="custom-control-label" for="show-password" style="cursor: pointer;">Show Password</label>
								</div>
								<a href="forgot-password.php" class="ml-auto">Forgot Password?</a>
							</div>
						</div>
						<div class="col-lg-12 m-b30">
							<button name="submit" type="submit" value="Submit" class="btn button-md">Login</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>