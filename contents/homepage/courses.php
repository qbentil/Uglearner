
<!-- Popular Courses/subjects -->
<div class="section-area section-sp2 popular-courses-bx">
	<div class="container">
		<div class="row">
			<div class="col-md-12 heading-bx left">
				<h2 class="title-head">Popular <span>Courses</span></h2>
				<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
			</div>
		</div>
		<div class="row">
		<div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
		<?php  
			$views = new Views();
			echo $views->get_courses("home");
		?>
		</div>
		</div>
	</div>
</div>
<!-- Popular Courses Popular Courses/subjects END -->