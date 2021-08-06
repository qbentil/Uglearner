		<?php
			$obj = new PageLauncher();
			// $obj->alert("success", "Congratulation!", "It is working successfully.")

		?>
		<div class="top-bar">
			<div class="container">
				<div class="row d-flex justify-content-between">
					<div class="topbar-left">
						<ul>
							<li><a href="faqs.php"><i class="ti-help-alt"></i>Give feedback</a></li>
							<li><a href="javascript:;"><i class="fa fa-envelope-o"></i>support@ugLearner.com</a></li>
						</ul>
					</div>
					<div class="topbar-right">
						<ul>
							<li>
								<select class="header-lang-bx">
									<option data-icon="flag flag-uk">English UK</option>
									<option data-icon="flag flag-us">English US</option>
								</select>
							</li>
							<li><a href="login.php">Login</a></li>
							<!-- <li><a href="register.html">Register</a></li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="sticky-header navbar-expand-lg">
            <div class="menu-bar clearfix">
                <div class="container clearfix">
					<!-- Header Logo ==== -->
					<?php
						$pg = new PageLauncher();
						$dropdowns = new Dropdowns();
						$pg->get_nav_logo($_SESSION['nav-logo']);
					?>
					<!-- Mobile Nav Button ==== -->
                    <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- Author Nav ==== -->
                    <div class="secondary-menu">
                        <div class="secondary-inner">
                            <ul>
								<li><a href="https://www.facebook.com/qbentil" target="_blank" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/bentilzone" target="_blank" class="btn-link"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/qbentil" target="_blank" class="btn-link"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.linkedin.com/in/shadrack-bentil-410422199" target="_blank" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
								<!-- Search Button ==== -->
								<li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li>
							</ul>
						</div>
                    </div>
					<!-- Search Box ==== -->
                    <div class="nav-search-bar">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span><i class="ti-search"></i></span>
                        </form>
						<span id="search-remove"><i class="ti-close"></i></span>
                    </div>
					<!-- Navigation Menu ==== -->
                    <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
						<div class="menu-logo">
							<a href="index.html"><img src="assets/images/logo.png" alt=""></a>
						</div>
                        <ul class="nav navbar-nav">	
							<!-- <li class="active"><a href="index.html">Home</a></li> -->
							
							<li><a href="schools.php">Faculty <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu add-menu">
									<li class="add-menu-left">
										<h5 class="menu-adv-title">Faculty</h5>
										<ul>
											<?php
												echo $dropdowns->colleges();
											?>
											<!-- <li><a href='#'>See more</a></li> -->
										</ul>
									</li>
									<li class="add-menu-right">
										<a href="">
											<img src="assets/images/adv/adv.jpg" alt=""/>
										</a>
									</li>
								</ul>
							</li>
							<li class="add-mega-menu"><a href="courses.php">Courses <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu add-menu">
									<li class="add-menu-left">
										<h5 class="menu-adv-title"> Courses</h5>
										<ul>
											<?php
												echo $dropdowns->courses();
											?>
											<!-- <li><a href='#'>See more</a></li> -->
										</ul>
									</li>
									<li class="add-menu-right">
										<a href="">
											<img src="assets/images/adv/adv.jpg" alt=""/>
										</a>
									</li>
								</ul>
							</li>
							<li class="add-mega-menu"><a href="communities.php">Communities <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu add-menu">
									<li class="add-menu-left">
										<h5 class="menu-adv-title"> Communities</h5>
										<ul>
											<?php
												echo $dropdowns->communities();
											?>
										</ul>
									</li>
									<li class="add-menu-right">
										<a href="">
											<img src="assets/images/adv/adv.jpg" alt=""/>
										</a>
									</li>
								</ul>
							</li>
							<li><a href="events.php">Events</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
						<div class="nav-social-link">
							<a href="javascript:;"><i class="fa fa-facebook"></i></a>
							<a href="javascript:;"><i class="fa fa-google-plus"></i></a>
							<a href="javascript:;"><i class="fa fa-linkedin"></i></a>
						</div>
                    </div>
					<!-- Navigation Menu END ==== -->
                </div>
            </div>
        </div>
    </header>
    <!-- Header Top END ==== -->