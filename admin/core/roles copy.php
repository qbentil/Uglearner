<?php
require "generals.php";
class Roles extends General
{
	private $con;
    function __construct()
    {
        parent::__construct();
		$this->con = $this->get("con");
		$this->set("tb", "roles");
    }

	public function new($name, $desc)
	{
		if(!$this->exists($this->get('tb'), "name", $name))
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
		$stmt = "UPDATE `roles` SET `name`=?,`description`=? WHERE `id`=?";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("ssi", $name, $desc, $id);
		$result = $pre_stmt->execute() or die($this->con->error);
		return $result? "ROLE_UPDATED_SUCCESSFULLY":"ROLE_UPDATE_FAILED";
	}


}

// $pr = new Roles();
// echo "<pre>";
// echo $pr->new("Super Admin", "Access all modules of this applications and Manage Administrators")."\n";
// echo $pr->trash(1)?"ROLE_TRASHED":"TRASH_FAILD";

// print_r($pr->singlerecord(3));

// echo "<h1 align='center'>Roles Class..............</h1>";