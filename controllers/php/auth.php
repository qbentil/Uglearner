<?php
    require "./../../admin/core/administrators.php";
    if(isset($_POST['action']) && $_POST['action'] == 'login'){
        $email = htmlspecialchars(strip_tags($_POST['email'])) ;
        $password = $_POST['password'];
        $flag = false;

        if(empty($email))
        {
            echo json_encode( ["status" => 0, "message" => "Enter your email"] );
            $flag = true;
            exit();
        }else
        {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                echo json_encode( ["status" => 0, "message" => "Enter a valid email"] );
                $flag = true;
                exit();
            }
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
            if (!preg_match($regex, $email)) {
                echo json_encode( ["status" => 0, "message" => "Enter a valid email"] );
                $flag = true;
                exit();
            }
        };
        if(empty($password))
        {
            echo json_encode( ["status" => 0, "message" => "Enter your password"] );  
            $flag = true;
            exit();
        }

        // exit();
        if(!$flag)
        {
            $admin = new Administrator();
            if($admin->login($email, $password)){
                echo json_encode( ["status" => 1, "message" => "Login successfull."] );  
                // $admin->redirect("./admin/");
                exit();
            }else{
                // echo json_encode( ["status" => 0, "message" => $password] );  
                echo json_encode( ["status" => 0, "message" => "Invalid email or password"] );  
                exit();
            }
            echo json_encode( ["status" => 0, "message" => "Database Communication broken!"] );  

        }
        
    }


?>