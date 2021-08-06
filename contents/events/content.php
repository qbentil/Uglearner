<?php
	if(isset($_GET['community']))
	{
		$q = $_GET['community'];
		$name = str_replace("-", " ", $q);

		$course = new uCommunity($name);
		if (!$course->exists()) {
			//echo "<script>alert('Error')</script>";
			// echo "<script> location.replace(\"events.php\"); </script>";
			// echo "<script> window.history.back(); </script>";
			$fetch_rule = "ORDER BY `name`";
		}else{

			$id = $course->id();
			$fetch_rule = "WHERE `cid` = $id ORDER BY `name`";
		}
	}
	else{
		$fetch_rule = "ORDER BY `name`";
	}
?>
<div class="clearfix">
	<ul id="masonry" class="ttr-gallery-listing magnific-image row">
		<?php
			$views = new Views();
			echo $views->get_events("alt", $fetch_rule);
		?>
	</ul>
</div>