<?php
class Roles
{
    private $con;
    private $tb;
    public function __construct($path = "../")
    {
        include_once($path."Database/db.php");
        $db = new Database();
        $this->con = $db->connect();
		$this->set("tb", "roles");
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


    protected function exists( $col, $val)
	{
		$tb = $this->tb;
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

	public function new($name, $desc)
	{
		if(!$this->exists($this->get("tb"), "name", $name))
		{
			$stmt = "INSERT INTO `roles`(`name`, `description`, `date_added`) VALUES (?,?,?)";
			$pre_stmt = $this->con->prepare($stmt);
			$date = date("y-m-d h:i:s");
			$pre_stmt->bind_param("sss", $name, $desc, $date);
			$result = $pre_stmt->execute() or die($this->con->error);
			return $result? "ROLE_ADDED_SUCCESSFULLY":"ROLE_ADDITION_FAILED";
		}
		return "ROLE_EXISTS";
	}
	public function update($id, $name, $desc)
	{
		$tb = $this->tb;
		$stmt = "UPDATE `$tb` SET `name`=?,`description`=? WHERE `id`=?";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("ssi", $name, $desc, $id);
		$result = $pre_stmt->execute() or die($this->con->error);
		return $result? "ROLE_UPDATED_SUCCESSFULLY":"ROLE_UPDATE_FAILED";
	}
    public function records($rule=NULL) // get all records in a table
	{
		$tb = $this->get("tb");
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
        $tb = $this->get("tb");
		$stmt = "SELECT * FROM  `$tb` WHERE id = ? LIMIT 1";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("i", $id);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		return $result->fetch_assoc();
	}
	public function getFullDate($date)
	{
		return substr(date('l',strtotime($date)), 0, 3). date('. F d, Y',strtotime($date));// will retuern format like  January
		//return substr($month, 0,3); // will return format like Jan
	}

}

// $pr = new Roles();
// echo "<pre>";
// echo $pr->new("Super Admin", "Access all modules of this applications and Manage Administrators")."\n";
// echo $pr->trash(1)?"ROLE_TRASHED":"TRASH_FAILD";

// print_r($pr->singlerecord(3));

// echo "<h1 align='center'>Roles Class..............</h1>";