<?php

    if(isset($_POST['action']) && $_POST['action'] == "update_personal_info")
    {
        // initial user entry
        $name = $_POST['name'];
        $email = htmlspecialchars(strip_tags($_POST['email'])) ;
        $phone = $_POST['phone'];
        $flag = false;

        // Validate and sanitize user data
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


        // exit();
        if(!$flag)
        {
            require_once "./../../../admin/core/administrators.php";
            $admin = new Administrator("./../../../");
            $id = $_SESSION["user_session"];
            
            // check for email change and update token
            $need_verification = false;
            $user = $admin->singlerecord($id);
            if($user['email'] == $email)
            {
                $token = $user['token'];
                $need_verification = false;
            }else{
                $token = md5(sha1($email));
                $need_verification = true;
            }

            if($admin->updateBasicInfo($id, $name, $phone, $email, $token)){
                echo json_encode( ["status" => 1, "message" => "Profile updated successfully!. \n <a href=''>reload</a> to see changes"] );  
                exit();
            }else{
                echo json_encode( ["status" => 0, "message" => "Sorry something went wrong. Try again."] );  
                exit();
            }
            echo json_encode( ["status" => 0, "message" => "Database Communication broken!"] );  

        }

    }
    if(isset($_POST['action']) && $_POST['action'] == "update_social_info")
    {
        // initial user entry
        $u_facebook = isset($_POST['u_facebook'])? $_POST['u_facebook']:NULL;
        $u_instagram = isset($_POST['u_instagram'])? $_POST['u_instagram']:NULL;
        $u_twitter =isset($_POST['u_twitter'])? $_POST['u_twitter']:NULL;
        $u_linkedin = isset($_POST['u_linkedin'])? $_POST['u_linkedin']:NULL;
        $flag = false;
        
        // if(isset($_POST['u_facebook']))
        // {
        //     $u_facebook = $_POST['u_facebook'];
        //     if(!filter_var($u_facebook, FILTER_VALIDATE_URL))
        //     {
        //         echo json_encode( ["status" => 0, "message" => "Enter a valid facebook profile url"] );
        //         $flag = true;
        //         exit();
        //     }
        // }else{
        //     $u_facebook = NULL;
        // }

        // if(isset($_POST['u_linkedin']))
        // {
        //     $u_linkedin = $_POST['u_linkedin'];
        //     if(!filter_var($u_linkedin, FILTER_VALIDATE_URL))
        //     {
        //         echo json_encode( ["status" => 0, "message" => "Enter a valid linked profile url"] );
        //         $flag = true;
        //         exit();
        //     }
        // }else{
        //     $u_linkedin = NULL;
        // }
        // if(isset($_POST['u_twitter']))
        // {
        //     $u_twitter = $_POST['u_twitter'];
        //     if(!filter_var($u_twitter, FILTER_VALIDATE_URL))
        //     {
        //         echo json_encode( ["status" => 0, "message" => "Enter a valid twitter profile link"] );
        //         $flag = true;
        //         exit();
        //     }
        // }else{
        //     $u_twitter = NULL;
        // }
        // if(isset($$_POST['u_instagram']))
        // {
        //     $u_instagram = $_POST['u_instagram'];
        //     if(!filter_var($u_instagram, FILTER_VALIDATE_URL))
        //     {
        //         echo json_encode( ["status" => 0, "message" => "Enter a valid instagram profile link"] );
        //         $flag = true;
        //         exit();
        //     }
        // }else{
        //     $u_instagram = NULL;
        // }

        // exit();
        if(!$flag)
        {
            require_once "./../../../admin/core/administrators.php";
            $admin = new Administrator("./../../../");
            $id = $_SESSION["user_session"];

            if($admin->updateSocials($id, $u_facebook, $u_instagram, $u_twitter, $u_linkedin)){
                echo json_encode( ["status" => 1, "message" => "Social links updated successfully!. \n <a href=''>reload</a> to see changes"] );  
                exit();
            }else{
                echo json_encode( ["status" => 0, "message" => "Sorry something went wrong. Try again."] );  
                exit();
            }
            echo json_encode( ["status" => 0, "message" => "Database Communication broken!"] );  

        }

    }
    if(isset($_POST['action']) && $_POST['action'] == "update_password")
    {
        // initial user entry
        $cu_password = $_POST['cu_password'];
        $nu_password = $_POST['nu_password'];
        $ru_password =$_POST['ru_password'];
        $flag = false;

        if(empty($cu_password))
        {
            echo json_encode( ["status" => 0, "message" => "Enter your current password"] );  
            $flag = true;
            exit();
        }

        if(empty($nu_password))
        {
            echo json_encode( ["status" => 0, "message" => "Choose a new Password"] );
            $flag = true;
            exit();
        }
        $uppercase = preg_match('@[A-Z]@', $nu_password);
        $lowercase = preg_match('@[a-z]@', $nu_password);
        $number    = preg_match('@[0-9]@', $nu_password);

        if( strlen($nu_password) < 8) {
            echo json_encode( ["status" => 0, "message" => "Password must be atleast 8 characters"] );
            $flag = true;
            exit();
        }
        if(!$number) {
            echo json_encode( ["status" => 0, "message" => "Password must contain atleast 1 number"] );
            $flag = true;
            exit();
        }
        if(!$lowercase) {
            echo json_encode( ["status" => 0, "message" => "Password must include a lowercase"] );
            $flag = true;
            exit();
        }
        if(!$uppercase) {
            echo json_encode( ["status" => 0, "message" => "Password must include an uppercase"] );
            $flag = true;
            exit();
        }
        
        if($nu_password != $ru_password)
        {
            echo json_encode( ["status" => 0, "message" => "Confirm password do not match."] );
            $flag = true;
            exit();
        }

        if(!$flag)
        {
            require_once "./../../../admin/core/administrators.php";
            $admin = new Administrator("./../../../");
            $id = $_SESSION["user_session"];

            if($admin->changePassword($id, $cu_password, $nu_password)){
                echo json_encode( ["status" => 1, "message" => "Your password has been changed successfully."] );  
                exit();
            }else{
                    echo json_encode( ["status" => 0, "message" => "Incorrect current password."] );  
                    exit();
                }
                echo json_encode( ["status" => 0, "message" => "Sorry something went wrong! Please try again later."] );  
                
            // echo json_encode( ["status" => 1, "message" => "Ready to go."] );  
        }

    }


    if(isset($_POST['action']) && $_POST['action'] == "change_photo")
    {
        $image = $_FILES["img"]["name"];
        if(!empty($image))
        {
            $t_image = $_FILES["img"]["tmp_name"];
            $flag = false;
    
            $target_dir = "./../../../assets/images/profiles/";  //directory to store image
    
    
            $target_file = $target_dir . basename($image);
    
    
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            $check = getimagesize($t_image);
            if($check !== false) {
                echo json_encode( ["status" => 1, "message" => "File is an image - " . $check["mime"] . "."] );  
                $flag = true;
                exit();
    
            } else {
                echo json_encode( ["status" => 0, "message" => "File is not an image."] );  
                $flag = false;
                exit();
            }
            // Check file size if greater than 1MB
            if ($_FILES["img"]["size"] > 1000000) {
                echo json_encode( ["status" => 0, "message" => "File should be at most 1MB."] );  
                $flag = false;
                exit();
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                echo json_encode( ["status" => 0, "message" => "Sorry, only JPG, JPEG and PNG files are allowed."] );  
                $flag = false;
                exit();
            }

            // Upload photo to profiles directory
            if(!move_uploaded_file($_FILES["img"]["tmp_name"], $target_file))
            {
                echo json_encode( ["status" => 0, "message" => "Sorry, Your photo couldn't be uploaded. Please try again"] );  
                $flag = false;
                exit();
            }
    
            if(!$flag)
            {
                require_once "./../../../admin/core/administrators.php";
                $admin = new Administrator("./../../../");
                $id = $_SESSION["user_session"];
    
                if($admin->changePassword($id, $cu_password, $nu_password)){
                    echo json_encode( ["status" => 1, "message" => "Your password has been changed successfully."] );  
                    exit();
                }else{
                        echo json_encode( ["status" => 0, "message" => "Incorrect current password."] );  
                        exit();
                    }
                    echo json_encode( ["status" => 0, "message" => "Sorry something went wrong! Please try again later."] );  
                    
                // echo json_encode( ["status" => 1, "message" => "Ready to go."] );  
            } 
        }else{
            echo json_encode( ["status" => 0, "message" => "No image selected."] );  
            $flag = true;
            exit();
        }
    }
?>