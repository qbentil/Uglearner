<?php
require "generals.php";
class Contacts extends General
{
	private $con;
    private $tb;
    function __construct($path = "../")
    {
        parent::__construct($path);
		$this->con = $this->get("con");
        $this->set("tb", "contacts");
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


}

// $contact = new Contacts();
// echo "<pre>";
// echo $contact->send("Kelvin Sowah", "ksowah@st.ug.edu.gh", "0556845331", "Can't see Answers", "MCQ for DCIT 103 question 3 doesn't have answer. Thank you.");
// echo "<h1 align='center'>Contacts Class..............</h1>";