<?php
// require "generals.php";
// class Courses extends General
// {
// 	private $con;
//     function __construct()
//     {
//         parent::__construct();
// 		$this->con = $this->get("con");
// 		$this->set("tb", "courses");
//     }

// 	public function new($id, $title, $logo, $desc, $level, $cid, $photo = NULL, $lang="English")
// 	{
// 		if(!$this->exists($this->get("tb"),"tid", $id) || !$this->exists($this->get("tb"),"title", $title))
// 		{
// 			$stmt = "INSERT INTO `courses`(`tid`, `title`, `logo`, `photo`, `description`, `level`, `language`, `status`, `cid`, `date_added`) VALUES (?,?,?,?,?,?,?,?,?,?)";
// 			$pre_stmt = $this->con->prepare($stmt);
// 			$date = date("y-m-d h:i:s");
//             $status = "1";
// 			$pre_stmt->bind_param("ssssssssis",$id, $title, $logo, $photo, $desc, $level, $lang, $status, $cid, $date);
// 			$result = $pre_stmt->execute() or die($this->con->error);
// 			return $result? "COURSE_ADDED_SUCCESSFULLY":"COURSE_ADDITION_FAILED";
// 		}
// 		return "COURSE_EXISTS";
// 	}
// 	public function updateBasicInfo($tid, $title, $desc, $level, $lang,$id)
// 	{
// 		if(!$this->exists($this->get("tb"),"tid", $id) || !$this->exists($this->get("tb"),"title", $title))
// 		{
// 			$stmt = "UPDATE `courses` SET `tid`=?,`title`=?,`description`=?,`level`=?,`language`=? WHERE `id`=?";
// 			$pre_stmt = $this->con->prepare($stmt);
// 			$pre_stmt->bind_param("sssssi", $tid,$title, $desc,$level, $lang, $id);
// 			$result = $pre_stmt->execute() or die($this->con->error);
// 			return $result? "COURSES_UPDATED_SUCCESSFULLY":"COURSES_UPDATE_FAILED";
// 		}
// 		return "COURSE_EXISTS";
// 	}
	


// }

// $pr = new Courses();
// echo "<pre>";
// echo $pr->new("Stat111", "Introduction to statistics and probability I", "clogo.jpg", "about this courses", "100", 1);
// echo $pr->new("DCIT101", "Introduction to Computer Science", "dcitlogo.jpg", "about this courses", "100", 1);
// echo $pr->changeImage(1, "logo", "newlogo.jpg");
// print_r($pr->records());
// var_dump($pr->records());
// echo "<h1 align='center'>Courses Class..............</h1>";