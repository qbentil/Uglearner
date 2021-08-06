<?php
// Functions for managing users
class USER {
    private $conn;
	private $tb;
    function __construct()
    {
        include_once("./../../Database/db.php");
        // include_once("Database/db.php");
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

    public function runQuery($sql)  {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function register($uname,$umail,$upass)  {
        try {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);            
            $stmt = $this->conn->prepare("INSERT INTO users(user_name,user_email,user_pass) VALUES(:uname, :umail, :upass)");
            $stmt->bindparam(":uname", $uname);
            $stmt->bindparam(":umail", $umail);
            $stmt->bindparam(":upass", $new_password);                                        
            $stmt->execute();   
            return $stmt;   
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }               
    }

    public function doLogin($uname,$umail,$upass)   {
        try {
            $stmt = $this->conn->prepare("SELECT user_id, user_name, user_email, user_pass FROM users WHERE user_name=:uname OR user_email=:umail ");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1) {
                if(password_verify($upass, $userRow['user_pass'])) {
                    $_SESSION['user_session'] = $userRow['user_id'];
                    return true;
                } else {
                    return false;
                }
            }
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function is_loggedin() {
        if(isset($_SESSION['user_session'])) {
            return "Ok";
        }else{
            return "no";
        }
    }

    public function redirect($url) {
        header("Location: $url");
        exit;
    }

    public function doLogout() {
        unset($_SESSION['user_session']);
        return true;
    }
}

$user = new USER();
echo $user->is_loggedin();

?>