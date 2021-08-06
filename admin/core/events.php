<?php

class Event
{
	private $con;
	private $tb;
    function __construct($path = NULL)
    {
        include_once($path."Database/db.php");
        $db = new Database();
        $this->con = $db->connect();
		$this->set("tb", "events");
    }
	private function exist($name, $start)
	{
		$tb = $this->tb;
		
		$pre_stmt = $this->con->prepare("SELECT * FROM `$tb` WHERE `name` = ? AND `start` = ? LIMIT 1");
		$pre_stmt->bind_param("ss",$name,$start);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		if($result->num_rows > 0)
		{
			return true; 
		}else
		{
			return false;
		}
	}
	    // setter
		protected function set($property, $value)
		{
			$this->$property = $value;
		}
		// getter
		protected function get($name)
		{
		   return $this->$name;
		}
	
	
		protected function exists($tb, $col, $val)
		{
			$pre_stmt = $this->con->prepare("SELECT * FROM `$tb` WHERE $col = ? LIMIT 1");
			$pre_stmt->bind_param("s",$val);
			$pre_stmt->execute() or die($this->con->error);
			$result = $pre_stmt->get_result();
			if($result->num_rows > 0)
			{
				return true; 
			}else
			{
				return false;
			}
		}

	public function new($name,$rate, $venue, $desc, $start, $end, $cid, $flier = NULL)
	{
		if(!$this->exist($name, $start))
		{
			$stmt = "INSERT INTO `events`( `name`,`flier`, `rate`, `venue`, `description`, `status`, `start`, `end`, `cid`)  VALUES (?,?,?,?,?,?,?,?,?)";
			$pre_stmt = $this->con->prepare($stmt);
            $status = "1";
			$pre_stmt->bind_param("sssssssss", $name, $flier, $rate, $venue, $desc, $status, $start, $end, $cid);
			$result = $pre_stmt->execute() or die($this->con->error);
			return $result? "EVENT_ADDED_SUCCESSFULLY":"EVENT_ADDITION_FAILED";
		}
		return "EVENT_EXISTS";
	}
	public function updateBasicInfo($id, $name,$rate, $venue, $desc, $start, $end)
	{
		$stmt = "UPDATE `events` SET `name`=?,`rate` = ?, `venue` = ?, `description`=?, `start`=?, `end`=? WHERE `id`=?";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("ssssssi", $name, $rate, $venue, $desc, $start, $end, $id);
		$result = $pre_stmt->execute() or die($this->con->error);
		return $result? "EVENT_UPDATED_SUCCESSFULLY":"EVENT_UPDATE_FAILED";
	}
	public function trash( $id)
	{
        $tb = $this->tb;
		$stmt = "UPDATE `$tb` SET `status`=? WHERE `id`=?";
		$pre_stmt = $this->con->prepare($stmt);
		$status = "0";
		$pre_stmt->bind_param("si", $status, $id);
		$result = $pre_stmt->execute() or die($this->con->error);
		return $result? 1:0;
	}
	public function delete($id)
	{
        $tb = $this->tb;
		$stmt = "DELETE from `$tb` WHERE `id`=?";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("i", $id);
		$result = $pre_stmt->execute() or die($this->con->error);
		return $result? 1:0;
	}
	public function records($rule=NULL) // get all records in a table
	{
		$tb = $this->tb;
		$stmt = "SELECT * FROM `$tb` $rule";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		$rows = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}
		return "NO_DATA";
	}
	public function calendar() // get all records in a table
	{
		$tb = $this->tb;
		$stmt = "SELECT name AS 'title', start, end FROM `$tb`";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		$rows = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}
		return "NO_DATA";
	}


	public function singlerecord($id)
	{
		$tb = $this->tb;
		$stmt = "SELECT * FROM  `$tb` WHERE id = ? LIMIT 1";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("i", $id);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		return $result->fetch_assoc();
	}
	public function count($rule = NULL)
	{
		$tb = $this->tb;
		$stmt = "SELECT count(*) FROM `$tb` $rule"; 
		$pre_stmt = $this->con->prepare($stmt); 
		$pre_stmt->execute(); 
		$count = $pre_stmt->get_result()->fetch_row()[0]; 
		return $count;
	}

	public function event_organizers($cid, $path = "../")
	{
		require_once "communities.php";
		$com = new Community($path);
		return $com->singlerecord($cid);
	}








	public function getMonth($date)
	{
		return date('F',strtotime($date));// will retuern format like  January
		//return substr($month, 0,3); // will return format like Jan
	}
	public function getFullDate($date)
	{
		return date('F d, Y',strtotime($date));// will retuern format like  January
		//return substr($month, 0,3); // will return format like Jan
	}
	public function getDay($date)
	{
		return date("j", strtotime($date));
	}

	public function formatTime($date)
	{
		return date("g : i A", strtotime($date));
	}
}

// $pr = new Event();
// echo "<pre>";
// $name = "2021 COMPSSA Python bootcamp";
// $flier = "flier.png";
// $desc = "A meetup for all computer science students to equip themselve in python nmachine learning";
// $venue = "The Software lab.";
// $rate = "50";
// $start = "2021-05-28 11:43:53";
// $end = "2021-06-02 11:43:53";
// $cid = "2";

// // echo $pr->new($name, $rate, $venue, $desc, $start, $end, $cid);
// // echo $pr->updateBasicInfo(1, $name, $rate, $venue, $desc, $start, $end);
// // echo $pr->changeImage(1, "flier", "flier.jpg");
// print_r($pr->records());
// echo "<h1 align='center'>EVENTS Class..............</h1>";