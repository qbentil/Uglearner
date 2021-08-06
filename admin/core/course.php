<?php
// require "generals.php";
class Courses
{
	private $con;
	private $tb;
    function __construct($path = NULL)
    {
        include_once($path."Database/db.php");
        $db = new Database();
        $this->con = $db->connect();
		$this->set("tb", "courses");
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
	public function new($id, $title, $logo, $desc, $level, $cid, $photo = NULL, $lang="English")
	{
		if(!$this->exists($this->tb,"tid", $id) || !$this->exists($this->tb,"title", $title))
		{
			$stmt = "INSERT INTO `courses`(`tid`, `title`, `logo`, `photo`, `description`, `level`, `language`, `status`, `cid`, `date_added`) VALUES (?,?,?,?,?,?,?,?,?,?)";
			$pre_stmt = $this->con->prepare($stmt);
			$date = date("y-m-d h:i:s");
            $status = "0";
			$pre_stmt->bind_param("ssssssssis",$id, $title, $logo, $photo, $desc, $level, $lang, $status, $cid, $date);
			$result = $pre_stmt->execute() or die($this->con->error);
			return $result? "COURSE_ADDED_SUCCESSFULLY":"COURSE_ADDITION_FAILED";
		}
		return "COURSE_EXISTS";
	}
	public function updateBasicInfo($tid, $title, $desc, $level, $lang,$id)
	{
		if(!$this->exists($this->tb,"tid", $id) || !$this->exists($this->tb,"title", $title))
		{
			$stmt = "UPDATE `courses` SET `tid`=?,`title`=?,`description`=?,`level`=?,`language`=? WHERE `id`=?";
			$pre_stmt = $this->con->prepare($stmt);
			$pre_stmt->bind_param("sssssi", $tid,$title, $desc,$level, $lang, $id);
			$result = $pre_stmt->execute() or die($this->con->error);
			return $result? "COURSES_UPDATED_SUCCESSFULLY":"COURSES_UPDATE_FAILED";
		}
		return "COURSE_EXISTS";
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

	public function singlerecord($val, $col="id")
	{
		$tb = $this->tb;
		$stmt = "SELECT * FROM  `$tb` WHERE $col = ? LIMIT 1";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("s", $val);
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


	public function status($id)
	{
		return $this->singlerecord($id)['status'] ==1? "Approved": "Pending";
	}


	public function faculty($id, $path="../")
	{
		require_once "department.php";
		$dep = new Department($path);
		return $dep->singlerecord($id);
	}













	public function getMonth($date)
	{
		return date('F',strtotime($date));// will retuern format like  January
		//return substr($month, 0,3); // will return format like Jan
	}
	public function getFullDate($date)
	{
		return date('F d, y',strtotime($date));// will retuern format like  January
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

// $pr = new Courses();
// echo "<pre>";
// echo $pr->new("Stat111", "Introduction to statistics and probability I", "clogo.jpg", "about this courses", "100", 1);
// echo $pr->new("DCIT101", "Introduction to Computer Science", "dcitlogo.jpg", "about this courses", "100", 1);
// echo $pr->changeImage(1, "logo", "newlogo.jpg");
// print_r($pr->records());
// var_dump($pr->records());
// echo "<h1 align='center'>Courses Class..............</h1>";

?>