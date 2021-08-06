<?php
require "generals.php";
class Newsletter extends General
{
	private $con;
    function __construct($path = "../")
    {
        parent::__construct($path);
		$this->con = $this->get("con");
    }


	public function subscribe($email)
	{
        if(!$this->exists("subscribers", "email", $email))
        {
            $stmt = "INSERT INTO `subscribers`(`email`, `date_added`) VALUES (?,?)";
            $pre_stmt = $this->con->prepare($stmt);
            $date = date("y-m-d h:i:s");
            $pre_stmt->bind_param("ss", $email, $date);
            $result = $pre_stmt->execute() or die($this->con->error);
            return $result? "added":"error";
        }else{
            return "exists";
        }

	}
}


// $conn = new Newsletter("../../");
// echo $conn->subscribe("sbentil005@st.ug.edu.gh");
