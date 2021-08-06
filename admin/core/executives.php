<?php
class Executive
{
	private $con;
	private $tb;
    function __construct($path = "./../../")
    {
        // include_once("./Database/db.php");
        include_once($path."Database/db.php");
        $db = new Database();
        $this->con = $db->connect();
        $this->tb = "executives";
    }
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

	public function new($pid, $name,$position,$phone, $email, $photo = NULL, $fbl=NULL,$ghl=NULL,$twl=NULL,$lnl = NULL)
	{
		if(!$this->exists($this->get("tb"),"email", $email) || !$this->exists($this->get("tb"),"position", $position))
		{
			$stmt = "INSERT INTO `executives`(`name`, `photo`, `position`, `phone`, `email`, `facebook`, `twitter`, `linkedin`, `github`, `pid`, `date_added`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
			$pre_stmt = $this->con->prepare($stmt);
			$date = date("y-m-d h:i:s");
			$pre_stmt->bind_param("sssssssssis",$name, $photo,$position, $phone, $email, $fbl,  $twl, $lnl, $ghl, $pid, $date);
			$result = $pre_stmt->execute() or die($this->con->error);
			return $result? 1:0;
		}
		return 0;
	}
	public function updateBasicInfo($name, $position, $phone, $email,$id)
	{
		if(!$this->exists($this->get("tb"),"position", $position) || !$this->exists($this->get("tb"),"phone", $phone) || !$this->exists($this->get("tb"),"email", $email))
		{
			$stmt = "UPDATE `executives` SET `name`=?,`position`=?,`phone`=?,`email`=? WHERE `id`=?";
			$pre_stmt = $this->con->prepare($stmt);
			$pre_stmt->bind_param("ssssi", $name,$position, $phone,$email, $id);
			$result = $pre_stmt->execute() or die($this->con->error);
			return $result? "eMEMBER_UPDATED_SUCCESSFULLY":"eMEMBER_UPDATE_FAILED";
		}
		return "eMEMBER_EXISTS";
	}


	public function updateSocials($id, $fbl, $ghl, $twl, $lnl)
	{
		$stmt = "UPDATE `executives` SET `facebook`=?,`github`=?,`twitter`=?, `linkedin`=? WHERE `id`=?";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("ssssi",$fbl, $ghl, $twl,$lnl, $id);
		$result = $pre_stmt->execute() or die($this->con->error);
		return $result? "eMEMBER_UPDATED_SUCCESSFULLY":"eMEMBER_UPDATE_FAILED";
	}

}

// $pr = new Executive();
// echo "<pre>";
// $name = "Bentil Shadrack";
// $phone = "0556844331";
// $email = "sbentil005@st.ug.edu.gh";
// $position = "President";
// $pid = 1;
// $fbl = "https:www.facebook.com/qbentil";
// $twl = "https:www.twitter.com/bentilzone";
// $lnl = "https:www.linkedin.com/qbentil";
// $ghl = "https:www.github.com/qbentil";
// echo $pr->updateSocials(1, "https:www.facebook.com/", "https:www.telegram.com/", );
// echo $pr->new($pid, $name, $position, $phone, $email);
// echo $pr->updateSocials(1, $fbl, $ghl, $twl, $lnl);
// echo $pr->changeImage(1, "photo", "self.jpg");
// print_r($pr->records()[0]);
// var_dump($pr->records());
// echo "<h1 align='center'>Executives Class..............</h1>";