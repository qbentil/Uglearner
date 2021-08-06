<?php

class MCQ
{
	private $con;
	private $tb;
    function __construct()
    {
        include_once("Database/db.php");
        $db = new Database();
        $this->con = $db->connect();
		$this->set("tb", "questions");
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
	// private function add($name, $desc)
	// {
	// 	if(!$this->exists($name))
	// 	{
	// 		$stmt = "INSERT INTO `roles`(`name`, `description`, `date_added`) VALUES (?,?,?)";
	// 		$pre_stmt = $this->con->prepare($stmt);
	// 		$date = date("y-m-d h:i:s");
	// 		$pre_stmt->bind_param("sss", $name, $desc, $date);
	// 		$result = $pre_stmt->execute() or die($this->con->error);
	// 		return $result? "ROLE_ADDED_SUCCESSFULLY":"ROLE_ADDITION_FAILED";
	// 	}
	// 	return "ROLE_EXISTS";
	// }
	// public function update($id, $name, $desc)
	// {
	// 	$stmt = "UPDATE `roles` SET `name`=?,`description`=? WHERE `id`=?";
	// 	$pre_stmt = $this->con->prepare($stmt);
	// 	$pre_stmt->bind_param("ssi", $name, $desc, $id);
	// 	$result = $pre_stmt->execute() or die($this->con->error);
	// 	return $result? "ROLE_UPDATED_SUCCESSFULLY":"ROLE_UPDATE_FAILED";
	// }

	public function count($rule = NULL)
	{
		$tb = $this->tb;
		$stmt = "SELECT count(*) FROM `$tb` $rule"; 
		$pre_stmt = $this->con->prepare($stmt); 
		$pre_stmt->execute(); 
		$count = $pre_stmt->get_result()->fetch_row()[0]; 
		return $count;
	}

}

// $pr = new MCQ();
// echo "<pre>";
// echo $pr->new("Super Admin", "Access all modules of this applications and Manage Administrators")."\n";
// echo $pr->update(1, "Super Admin", "Access all modules of this applications and Manage Administrators");
// echo "<h1 align='center'>Roles Class..............</h1>";