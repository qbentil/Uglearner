<?php
// require "generals.php";
class Department
{
	private $con;
	private $tb;
    function __construct($path = NULL)
    {
        include_once($path."Database/db.php");
        $db = new Database();
        $this->con = $db->connect();
		$this->set("tb", "categories");
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

	public function new($name, $logo, $desc, $address, $email,$photo = NULL,  $fbl=NULL, $tgl=NULL, $twl=NULL)
	{
		if(!$this->exists($this->tb, "name", $name))
		{
			$stmt = "INSERT INTO `categories`(`name`, `logo`, `photo`, `description`, `address`, `email`, `facebook`, `telegram`, `twitter`,`status`, `date_added`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
			$pre_stmt = $this->con->prepare($stmt);
			$date = date("y-m-d h:i:s");
            $status = "1";
			$pre_stmt->bind_param("sssssssssss", $name, $logo, $photo, $desc, $address, $email,  $fbl, $tgl, $twl, $status, $date);
			$result = $pre_stmt->execute() or die($this->con->error);
			return $result? "DEPARTMENT_ADDED_SUCCESSFULLY":"DEPARTMENT_ADDITION_FAILED";
		}
		return "DEPARTMENT_EXISTS";
	}
	public function updateBasicInfo($id, $name, $desc, $address, $email)
	{
		$stmt = "UPDATE `categories` SET `name`=?,`description`=?,`address`=?,`email`=? WHERE `id`=?";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("ssssi", $name, $desc,$address, $email, $id);
		$result = $pre_stmt->execute() or die($this->con->error);
		return $result? "DEPARTMENT_UPDATED_SUCCESSFULLY":"DEPARTMENT_UPDATE_FAILED";
	}
	public function updateSocials($id, $fbl, $tgl, $twl)
	{
		$stmt = "UPDATE `categories` SET `facebook`=?,`telegram`=?,`twitter`=? WHERE `id`=?";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("sssi",$fbl, $tgl, $twl, $id);
		$result = $pre_stmt->execute() or die($this->con->error);
		return $result? "DEPARTMENT_UPDATED_SUCCESSFULLY":"DEPARTMENT_UPDATE_FAILED";
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
// print_r($pr->records());
// echo "<h1 align='center'>Department Class..............</h1>";

?>