<?php


if(isset($_POST['action']) && $_POST['action'] == "null")
{
    $name = $_POST["e_name"];
    $description = $_POST["e_description"];
    $venue = $_POST["e_venue"];
    $rate = $_POST["e_rate"];
    $dstart = $_POST["e_dstart"];
    $dend = $_POST["e_dend"];
    $flyer = $_FILES["e_flyer"]["name"];
    $flag = false;

    // validation and sanitization
    if(empty($name))
    {
        echo json_encode( ["status" => 0, "message" => "Event name is required"] );  
        $flag = true;
        exit();
    }
    if(empty($description)) //desc
    {
        echo json_encode( ["status" => 0, "message" => "Enter event description"] );  
        $flag = true;
        exit();
    }
    if(empty($dstart)) //desc
    {
        echo json_encode( ["status" => 0, "message" => "Select event start date/time"] );  
        $flag = true;
        exit();
    }
    if(empty($dend)) //desc
    {
        echo json_encode( ["status" => 0, "message" => "Select event end date/time"] );  
        $flag = true;
        exit();
    }
    if(empty($rate)) //rate
    {
        $rate = 0;
    }

    if(!empty($flyer))
    {
        $t_image = $_FILES["e_flyer"]["tmp_name"];
        $target_dir = "./../../../assets/images/events/";  //directory to store image


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
            $flag = true;
            exit();
        }
        // Check file size if greater than 1MB
        if ($_FILES["e_flyer"]["size"] > 1000000) {
            echo json_encode( ["status" => 0, "message" => "File should be at most 1MB."] );  
            $flag = true;
            exit();
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
            echo json_encode( ["status" => 0, "message" => "Sorry, only JPG, JPEG and PNG files are allowed."] );  
            $flag = true;
            exit();
        }

        // Upload photo to profiles directory
        if(!move_uploaded_file($_FILES["e_flyer"]["tmp_name"], $target_file))
        {
            echo json_encode( ["status" => 0, "message" => "Sorry, Your photo couldn't be uploaded. Please try again"] );  
            $flag = true;
            exit();
        }
    }else{
        echo json_encode( ["status" => 0, "message" => "No image selected."] );  
        $flag = true;
        exit();
    }

    if(!$flag)
    {
        require_once "./../../../admin/core/events.php";
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