<?php
// require "generals.php";
class Community
{
	private $con;
	private $tb;
    function __construct($path = NULL)
    {
        include_once($path."Database/db.php");
        $db = new Database();
        $this->con = $db->connect();
		$this->set("tb", "communities");
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
	public function new($cid,$name,$slug, $logo, $about, $email,$photo = NULL,  $fbl=NULL, $igl=NULL, $twl=NULL)
	{
		if(!$this->exists($this->get("tb"), "name", $name) && !$this->exists($this->get("tb"), "slug", $slug))
		{
			$stmt = "INSERT INTO `communities`( `cid`,`name`, `slug`, `logo`, `photo`, `about`, `email`, `status`, `facebook`, `instagram`, `twitter`, `date_added`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
			$pre_stmt = $this->con->prepare($stmt);
			$date = date("y-m-d h:i:s");
            $status = "1";
			$pre_stmt->bind_param("isssssssssss", $cid,$name,$slug, $logo, $photo, $about, $email,$status,  $fbl, $igl, $twl, $date);
			$result = $pre_stmt->execute() or die($this->con->error);
			return $result? "COMMUNITY_ADDED_SUCCESSFULLY":"COMMUNITY_ADDITION_FAILED";
		}
		return "COMMUNITY_EXISTS";
	}
	public function updateBasicInfo($id, $name,$slug, $about)
	{
		$stmt = "UPDATE `communities` SET `name`=?,`slug`=?,`about`=? WHERE `id`=?";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("sssi", $name, $slug, $about, $id);
		$result = $pre_stmt->execute() or die($this->con->error);
		return $result? "COMMUNITY_UPDATED_SUCCESSFULLY":"COMMUNITY_UPDATE_FAILED";
	}
	public function updateSocials($id, $fbl, $igl, $twl)
	{
		$stmt = "UPDATE `communities` SET `facebook`=?,`instagram`=?,`twitter`=? WHERE `id`=?";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("sssi",$fbl, $igl, $twl, $id);
		$result = $pre_stmt->execute() or die($this->con->error);
		return $result? "COMMUNITY_UPDATED_SUCCESSFULLY":"COMMUNITY_UPDATE_FAILED";
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

	public function faculty($id, $path="../")
	{
		require_once "department.php";
		$dep = new Department($path);
		return $dep->singlerecord($id);
	}
}

// $pr = new Community();
// echo "<pre>";
// $name = "Computer Science Students Association";
// $slug = "COMPSSA";
// $logo = "logo.png";
// $about = "Developer community for IT and computer science students";
// $email = "compssa@st.ug.edu.gh";
// $cid = 1;

// echo $pr->new($cid,$name,$slug, $logo, $about, $email);
// echo $pr->updateSocials(1, "https://www.facebook.com/compssa", "https://www.instagram.com/compssa", "https://www.twitter.com/compssa");
// echo $pr->changeImage(1, "photo", "featured.jpg");
// print_r($pr->singlerecord(1));
// echo "<h1 align='center'>Communities Class..............</h1>";