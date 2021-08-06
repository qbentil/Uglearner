<?php
// require "generals.php";
// class Event extends General
// {
// 	private $con;
//     function __construct()
//     {
//         parent::__construct();
// 		$this->con = $this->get("con");
// 		$this->set("tb", "events");
//     }
// 	private function exist($name, $start)
// 	{
// 		$tb = $this->get("tb");
		
// 		$pre_stmt = $this->con->prepare("SELECT * FROM `$tb` WHERE `name` = ? AND `start` = ? LIMIT 1");
// 		$pre_stmt->bind_param("ss",$name,$start);
// 		$pre_stmt->execute() or die($this->con->error);
// 		$result = $pre_stmt->get_result();
// 		if($result->num_rows > 0)
// 		{
// 			return true; 
// 		}else
// 		{
// 			return false;
// 		}
// 	}

// 	public function new($name,$rate, $venue, $desc, $start, $end, $cid, $flier = NULL)
// 	{
// 		if(!$this->exist($name, $start))
// 		{
// 			$stmt = "INSERT INTO `events`( `name`,`flier`, `rate`, `venue`, `description`, `status`, `start`, `end`, `cid`)  VALUES (?,?,?,?,?,?,?,?,?)";
// 			$pre_stmt = $this->con->prepare($stmt);
//             $status = "1";
// 			$pre_stmt->bind_param("sssssssss", $name, $flier, $rate, $venue, $desc, $status, $start, $end, $cid);
// 			$result = $pre_stmt->execute() or die($this->con->error);
// 			return $result? "EVENT_ADDED_SUCCESSFULLY":"EVENT_ADDITION_FAILED";
// 		}
// 		return "EVENT_EXISTS";
// 	}
// 	public function updateBasicInfo($id, $name,$rate, $venue, $desc, $start, $end)
// 	{
// 		$stmt = "UPDATE `events` SET `name`=?,`rate` = ?, `venue` = ?, `description`=?, `start`=?, `end`=? WHERE `id`=?";
// 		$pre_stmt = $this->con->prepare($stmt);
// 		$pre_stmt->bind_param("ssssssi", $name, $rate, $venue, $desc, $start, $end, $id);
// 		$result = $pre_stmt->execute() or die($this->con->error);
// 		return $result? "EVENT_UPDATED_SUCCESSFULLY":"EVENT_UPDATE_FAILED";
// 	}











// 	public function getMonth($date)
// 	{
// 		return date('F',strtotime($date));// will retuern format like  January
// 		//return substr($month, 0,3); // will return format like Jan
// 	}
// 	public function getDay($date)
// 	{
// 		return date("j", strtotime($date));
// 	}

// 	public function formatTime($date)
// 	{
// 		return date("g : i A", strtotime($date));
// 	}
// }

// // $pr = new Event();
// // echo "<pre>";
// // $name = "2021 COMPSSA Python bootcamp";
// // $flier = "flier.png";
// // $desc = "A meetup for all computer science students to equip themselve in python nmachine learning";
// // $venue = "The Software lab.";
// // $rate = "50";
// // $start = "2021-05-28 11:43:53";
// // $end = "2021-06-02 11:43:53";
// // $cid = "2";

// // // echo $pr->new($name, $rate, $venue, $desc, $start, $end, $cid);
// // // echo $pr->updateBasicInfo(1, $name, $rate, $venue, $desc, $start, $end);
// // // echo $pr->changeImage(1, "flier", "flier.jpg");
// // print_r($pr->records()[0]);
// // echo "<h1 align='center'>EVENTS Class..............</h1>";