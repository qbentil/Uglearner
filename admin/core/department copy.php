<?php
require "generals.php";
// class Department extends General
// {
// 	private $con;
//     function __construct()
//     {
//         parent::__construct();
// 		$this->con = $this->get("con");
// 		$this->set("tb", "categories");
//     }

// 	public function new($name, $logo, $desc, $address, $email,$photo = NULL,  $fbl=NULL, $tgl=NULL, $twl=NULL)
// 	{
// 		if(!$this->exists($this->get("tb"), "name", $name))
// 		{
// 			$stmt = "INSERT INTO `categories`(`name`, `logo`, `photo`, `description`, `address`, `email`, `facebook`, `telegram`, `twitter`,`status`, `date_added`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
// 			$pre_stmt = $this->con->prepare($stmt);
// 			$date = date("y-m-d h:i:s");
//             $status = "1";
// 			$pre_stmt->bind_param("sssssssssss", $name, $logo, $photo, $desc, $address, $email,  $fbl, $tgl, $twl, $status, $date);
// 			$result = $pre_stmt->execute() or die($this->con->error);
// 			return $result? "DEPARTMENT_ADDED_SUCCESSFULLY":"DEPARTMENT_ADDITION_FAILED";
// 		}
// 		return "DEPARTMENT_EXISTS";
// 	}
// 	public function updateBasicInfo($id, $name, $desc, $address, $email)
// 	{
// 		$stmt = "UPDATE `categories` SET `name`=?,`description`=?,`address`=?,`email`=? WHERE `id`=?";
// 		$pre_stmt = $this->con->prepare($stmt);
// 		$pre_stmt->bind_param("ssssi", $name, $desc,$address, $email, $id);
// 		$result = $pre_stmt->execute() or die($this->con->error);
// 		return $result? "DEPARTMENT_UPDATED_SUCCESSFULLY":"DEPARTMENT_UPDATE_FAILED";
// 	}
// 	public function updateSocials($id, $fbl, $tgl, $twl)
// 	{
// 		$stmt = "UPDATE `categories` SET `facebook`=?,`telegram`=?,`twitter`=? WHERE `id`=?";
// 		$pre_stmt = $this->con->prepare($stmt);
// 		$pre_stmt->bind_param("sssi",$fbl, $tgl, $twl, $id);
// 		$result = $pre_stmt->execute() or die($this->con->error);
// 		return $result? "DEPARTMENT_UPDATED_SUCCESSFULLY":"DEPARTMENT_UPDATE_FAILED";
// 	}

// }

// $pr = new Department();
// echo "<pre>";
// $name = "Computer Science";
// $logo = "logo.png";
// $desc = "A suburb of Basic and Applied Sciences";
// $address = "Opposite the maths dept.";
// $email = "cs@st.ug.edu.gh";

// echo $pr->new($name, $logo, $desc, $address, $email);
// // echo $pr->updateSocials(1, "https:www.facebook.com/", "https:www.telegram.com/", "https:www.twitter.com/");
// // echo $pr->changeImage(1, "logo", "newlogo.jpg");
// echo "<h1 align='center'>Department Class..............</h1>";