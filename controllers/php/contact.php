<?php
    require "./../../admin/core/contacts.php";
    if(isset($_POST['action']) && $_POST['action'] == 'contact_us'){
        $name = $_POST['name'];
        $email = htmlspecialchars(strip_tags($_POST['email'])) ;
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $message = htmlspecialchars(strip_tags($_POST['message']));
        $flag = false;
        if(empty($name))
        {
            echo json_encode( ["status" => 0, "message" => "Your name is required"] );  
            $flag = true;
            exit();
        }
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

        if(empty($phone))
        {
            echo json_encode( ["status" => 0, "message" => "Enter Phone number"] );  
            $flag = true;
            exit();
        }else{
            if(strlen($phone) != 10 | $phone[0] !=0)
            {
                echo json_encode( ["status" => 0, "message" => "Enter a valid phone number"] );  
                $flag = true;
                exit();
            }
        }
        if(empty($subject))
        {
            echo json_encode( ["status" => 0, "message" => "Enter message subject"] );  
            $flag = true;
            exit();
        }
        if(empty($message))
        {
            echo json_encode( ["status" => 0, "message" => "Write something for us"] );  
            $flag = true;
            exit();
        }
        // exit();
        if(!$flag)
        {
            $contact = new Contacts();
            if($contact->send($name, $email, $phone, $subject, $message)){
                echo json_encode( ["status" => 1, "message" => "Thank you for contacting us!."] );  
                exit();
            }else{
                echo json_encode( ["status" => 0, "message" => "Sorry something went wrong. Try again."] );  
                exit();
            }
            echo json_encode( ["status" => 0, "message" => "Database Communication broken!"] );  

        }
        
    }


?>