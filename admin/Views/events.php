<?php

    class vEvents{
        private $events;
        function __construct()
        {
            require_once "./core/events.php";
            $this->events = new Event("../");
        }


        public function fetch_events($fetch_rule = NULL)
        {
            $events = $this->events->records($fetch_rule);
            if($events !="NO_DATA")
            {
                // return $events;
                foreach ($events as $event) {
                    echo "
                    <tr>
                        <td>{$event['name']}</td>
                        <td>{$event['venue']}</td>
                        <td>{$this->events->getFullDate($event['start'])}</td>
                        <td>{$this->events->getFullDate($event['end'])}</td>
                        <td>
                            <a href='javascript:;' class='btn btn-sm edit_event_info_btn' data-id='{$event['id']}'><i class='ti-pencil-alt'></i></a>
                            <a href='javascript:;' class='btn btn-sm view_event_info_btn' data-id='{$event['id']}'><i class='ti-info-alt'></i></a>
                            <a href='javascript:;' class='btn btn-sm del_event_info_btn' data-id='{$event['id']}'><i class='ti-trash'></i></a>
                        </td>
                    </tr>
                    ";
                }
            }
        }
    }

    // update-event.php?id={$event['id']}
    // $opr = new vAdmins();
    // echo "<pre>";
    // var_dump($opr->fetch_admins());
?>