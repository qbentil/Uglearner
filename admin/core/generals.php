<?php

class General
{
    private $con;
    private $tb;
    public function __construct($path = "../")
    {
        // include_once("./Database/db.php");
        include_once($path."Database/db.php");
        $db = new Database();
        $this->con = $db->connect();
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
	private function currentPassword($id)
	{
		return $this->singlerecord($id)['password'];	
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

	
	public function changeImage($id, $row, $value)
	{
		$tb = $this->tb;
		$stmt = "UPDATE `$tb` SET `$row`=? WHERE `id`=?";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("si", $value, $id);
		$result = $pre_stmt->execute() or die($this->con->error);
		return $result? "IMAGE_UPDATED_SUCCESSFULLY":"IMAGE_UPDATE_FAILED";
	}


	public function changePassword($id, $cPassword, $nPassword)
	{
		if(sha1($cPassword) == $this->currentPassword($id))
		{
			$tb = $this->tb;
			$stmt = "UPDATE `$tb` SET `password`=? WHERE `id`=?";
			$pre_stmt = $this->con->prepare($stmt);
            $new_password = sha1($nPassword); 
			$pre_stmt->bind_param("si", $new_password, $id);
			$result = $pre_stmt->execute() or die($this->con->error);
			return $result? "PASSWORD_UPDATED_SUCCESSFULLY":"PASSWORD_UPDATE_FAILED";
		}
		return "INCORRECT_PASSWORD";
	}


	public function records($rule=NULL, $tb=NULL) // get all records in a table
	{
		$tb = $tb !=NULL? $tb: $this->get("tb");
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

	public function singlerecord($id, $tb = NULL)
	{
		if($tb == NULL)
		{
			$tb = $this->get("tb");
		}
		$stmt = "SELECT * FROM  `$tb` WHERE id = ? LIMIT 1";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("i", $id);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		return $result->fetch_assoc();
	}
	


















	public function getMonth($date)
	{
		return date('F',strtotime($date));// will retuern format like  January
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