<?php
class Portfolio
{
	private $con;
	private $tb;
    function __construct($path = NULL)
    {
        include_once($path."Database/db.php");
        $db = new Database();
        $this->con = $db->connect();
		$this->set("tb", "portfolio");
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

	public function new($name, $cid)
	{
		if(!$this->exists($this->get("tb"),"name", $name))
		{
			$stmt = "INSERT INTO `portfolio`( `name`, `cid`, `status`, `date_added`) VALUES (?,?,?,?)";
			$pre_stmt = $this->con->prepare($stmt);
			$date = date("y-m-d h:i:s");
            $status = "1";
			$pre_stmt->bind_param("siss",$name, $cid, $status, $date);
			$result = $pre_stmt->execute() or die($this->con->error);
			return $result? "PORTFOLIO_ADDED_SUCCESSFULLY":"PORTFOLIO_ADDITION_FAILED";
		}
		return "PORTFOLIO_EXISTS";
	}
	public function updateBasicInfo($name, $cid)
	{
        $stmt = "UPDATE `portfolio` SET `name`=?,`cid`=? WHERE `id`=?";
        $pre_stmt = $this->con->prepare($stmt);
        $pre_stmt->bind_param("ss", $name, $cid);
        $result = $pre_stmt->execute() or die($this->con->error);
        return $result? "PORTFOLIO_UPDATED_SUCCESSFULLY":"PORTFOLIO_UPDATE_FAILED";
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

	public function community($id, $path="../")
	{
		require_once "communities.php";
		$com = new Community($path);
		return $com->singlerecord($id);
	}
	public function other_communities($cid, $path="../")
	{
		require_once "communities.php";
		$com = new Community($path);
		$id = $this->community($cid)['id'];
		return $com->records("WHERE `id` <> $id");
	}
}

// $pr = new Portfolio();
// echo "<pre>";
// // echo $pr->new("COMPSSA 2021/2022", 1);
// print_r($pr->singlerecord(1));
// // var_dump($pr->records());
// echo "<h1 align='center'>Portfolio Class..............</h1>";