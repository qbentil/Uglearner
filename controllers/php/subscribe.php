<?php
    require "./../../admin/core/newsletter.php";
    require "./../../mails/email.php";
    if(isset($_POST['action']) && $_POST['action'] == 'subscribe'){
        $email = htmlspecialchars(strip_tags($_POST['email'])) ;
        $flag = false;


        // validate email
        if(empty($email))
        {
            echo json_encode( ["status" => 0, "message" => "Enter your email"] );
            $flag = true;
            exit();
        }else
        {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                echo json_encode( ["status" => 0, "message" => "Your email is not valid."] );
                $flag = true;
                exit();
            }
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
            if (!preg_match($regex, $email)) {
                echo json_encode( ["status" => 0, "message" => "Your email is not valid."] );
                $flag = true;
                exit();
            }
        };
        // exit();
        if(!$flag)
        {
            $to = array("email" => "$email", "name"=> NULL);
            $msg = "Thank you for subscribing to our newsletter! You will be receiving timly updates in courses and study materials from UGLEARNER.";
            $subject = "UGLEARNER: Newsletter subscription";
            $mail = new Mailer();
            
            if(!$mail->sendMail($to, $subject, $msg)){

                echo json_encode( ["status" => 0, "message" => "No Internet connection. \n Check your internet connection and try again."] );  
                exit();
            }else{
                $newsletter = new Newsletter("../../");
                if($newsletter->subscribe($email) == "added")
                {
                    echo json_encode( ["status" => 1, "message" => "Thank you for subscribing to our newsletter. \n You will receive timely course updates"] );  
                    exit();
                }else if($newsletter->subscribe($email) == "exist"){

                    echo json_encode( ["status" => 0, "message" => "You are already a subscriber to this newsletter. Thank you!"] );  
                    exit();
                }
            }

        }
        
    }





?>