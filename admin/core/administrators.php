<?php
class Administrator
{
	private $con;
    private $tb;
    function __construct($path = "./../../")
    {
        include_once($path."Database/db.php");
        // include_once("Database/db.php");
        $db = new Database();
        $this->con = $db->connect();
		$this->set("tb", "administrators");
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

	public function new($name,$phone, $email, $rid, $password, $token = NULL, $photo = "user.png",  $fbl=NULL, $igl=NULL, $twl=NULL, $lnl = NULL)
	{
		if(!$this->exists($this->get("tb"), "phone", $phone) && !$this->exists($this->get("tb"), "email", $email))
		{
			$stmt = "INSERT INTO `administrators`(`name`, `photo`, `phone`, `email`, `rid`, `password`, `token`, `status`, `facebook`, `instagram`, `twitter`, `linkedin`, `date_added`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$pre_stmt = $this->con->prepare($stmt);
			$date = date("y-m-d h:i:s");
            $status = "1";
            $password = sha1($password);  
			$pre_stmt->bind_param("ssssissssssss", $name, $photo, $phone, $email, $rid, $password, $token,$status,  $fbl, $igl, $twl,$lnl, $date);
			$result = $pre_stmt->execute() or die($this->con->error);
			return $result? "ADMIN_ADDED_SUCCESSFULLY":"ADMIN_ADDITION_FAILED";
		}
		return "ADMIN_EXISTS";
	}
	public function updateBasicInfo($id,$name, $phone, $email, $token)
	{
		$stmt = "UPDATE `administrators` SET `name`=?,`phone`=?, `email`=?, `token`=? WHERE `id`=?";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("ssssi", $name, $phone,$email, $token, $id);
		$result = $pre_stmt->execute() or die($this->con->error);
		return $result? 1:0;
	}
	public function updateSocials($id, $fbl, $igl, $twl, $lnl)
	{
		$stmt = "UPDATE `administrators` SET `facebook`=?,`instagram`=?,`twitter`=?, `linkedin`=? WHERE `id`=?";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("ssssi",$fbl, $igl, $twl,$lnl, $id);
		$result = $pre_stmt->execute() or die($this->con->error);
		return $result? "ADMIN_UPDATED_SUCCESSFULLY":"ADMIN_UPDATE_FAILED";
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
	private function currentPassword($id)
	{
		return $this->singlerecord($id)['password'];	
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
			return $result? 1:0;
		}
		return 0;
	}


	public function records($rule=NULL) // get all records in a table
	{
		$tb =$this->tb;
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
	public function admin_role($rid, $path = "../")
	{
		require_once "roles.php";
		$role = new Roles($path);
		return $role->singlerecord($rid);
	}
	public function singlerecord($id)
	{
        $tb = $this->tb;
		$stmt = "SELECT * FROM  `$tb` WHERE id = ? LIMIT 1";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("i", $id);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		return $result->fetch_assoc();
	}

	public function login($umail,$upass)   {
        try {
            $tb = $this->tb;
            $stmt = "SELECT * FROM `{$tb}` WHERE email=?";
            $pre_stmt = $this->con->prepare($stmt);
            $pre_stmt->bind_param("s",$umail);
            $pre_stmt->execute() or die($this->con->error);
            $result = $pre_stmt->get_result();
            if ($result->num_rows == 1) {
                $result = $result->fetch_assoc();
                if(sha1($upass) == $result['password']) {
                    $_SESSION['user_session'] = $result['id'];
                    return true;
                } else {
                    return false;
                }
            }
        }
        catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    public function is_loggedin() {
        if(isset($_SESSION['user_session'])) {
            return true;
        }
		return false;
    }

    public function redirect($url) {
        header("Location: $url");
        exit;
    }

    public function logout() {
        unset($_SESSION['user_session']);
        return true;
    }

	public function url_check($item, $def="#")
	{
		return !isset($item)? $def:$item;
	}


}

// $pr = new Administrator();
// echo "<pre>";
// $name = "Kelvin Sowah Nii";
// $phone = "0244506057";
// $password = "admin123";
// $email = "skelvin@st.ug.edu.gh";
// $rid = 3;

// echo $pr->new($name,$phone,$email, $rid, $password);
// echo $pr->updateBasicInfo(1, $name, $phone);
// echo $pr->updateSocials(1, "https:www.facebook.com/", "https:www.telegram.com/", "https:www.twitter.com/");
// echo $pr->changeImage(1, "photo", "users.png");
// echo $pr->changePassword(1, "newPassword", $password);
// echo "<h1 align='center'>Administrators Class..............</h1>";