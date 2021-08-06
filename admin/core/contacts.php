<?php
class Contacts
{
	private $con;
	private $tb;
    function __construct($path = "./../../")
    {
        // include_once("./Database/db.php");
        include_once($path."Database/db.php");
        $db = new Database();
        $this->con = $db->connect();
        $this->tb = "contacts";
    }
    protected function get($name)
    {
        return $this->$name;
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
	public function send($sname, $semail, $sphone, $subject, $message)
	{
        $tb = $this->tb;
        $stmt = "INSERT INTO `$tb`(`name`, `email`, `phone`, `subject`, `message`, `status`, `date`) VALUES (?,?,?,?,?,?,?)";
        $pre_stmt = $this->con->prepare($stmt);
        $date = date("y-m-d h:i:s");
        $status = "0";
        $pre_stmt->bind_param("sssssss", $sname, $semail,$sphone, $subject, $message, $status, $date);
        $result = $pre_stmt->execute() or die($this->con->error);
        return $result? 1:0;
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
    public function read_status($id, $stat)
	{
        $tb = $this->tb;
		$stmt = "UPDATE `$tb` SET `status`=? WHERE `id`=?";
		$pre_stmt = $this->con->prepare($stmt);
		$status = $stat == "0"? "1":"0";
		$pre_stmt->bind_param("si", $status, $id);
		$result = $pre_stmt->execute() or die($this->con->error);
		return $result? $status: "ERROR";
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


	public function getFullDateTime($date)
	{
		return substr(date('l',strtotime($date)), 0, 3).date('. F d, Y g:i a',strtotime($date));// will retuern format like  January
		//return substr($month, 0,3); // will return format like Jan
	}
	public function getFullDate($date)
	{
		return substr(date('l',strtotime($date)), 0, 3). date('. F d, Y',strtotime($date));// will retuern format like  January
		//return substr($month, 0,3); // will return format like Jan
	}
	public function getFullTime($date)
	{
		return date('g : i A',strtotime($date));// will retuern format like  January
		//return substr($month, 0,3); // will return format like Jan
	}
}

// $contact = new Contacts();
// echo "<pre>";
// echo $contact->send("Kelvin Sowah", "ksowah@st.ug.edu.gh", "0556845331", "Can't see Answers", "MCQ for DCIT 103 question 3 doesn't have answer. Thank you.");
// echo "<h1 align='center'>Contacts Class..............</h1>";