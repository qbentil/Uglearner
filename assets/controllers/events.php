<?php
    // echo "Hi";
    // exit();
    require "../../core/events.php";
    if(isset($_POST['action']) && $_POST['action'] == 'events')
    {
        $events = new Event("./../../../");
        if($events->calendar() !="NO_DATA")
        {
            // echo "OK";
            echo json_encode($events->calendar());
        }
        else{
            echo "NO_EVENT";
        }
    }
?>