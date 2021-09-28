<?php
function file_upload($file, $identifier)
{
    if($file['name'] != "")
    {
        $test = explode('.', $_FILES['user_image']['name']);
        $extension = end($test);    
        $name = rand(100,999).'.'.$extension;
        $target_dir = "../../assets/images/users/";  //directory to store image
        $path = $target_dir.$name;
        if(move_uploaded_file($_FILES['user_image']['tmp_name'], $path))
        {
            return $name;
        }else
        {
            echo json_encode( ["status" => 0, "message" => "$identifier upload failed on move_upload"] );
            exit();
        }
    }else{
        return NULL;
    }
}


?>