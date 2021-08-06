<?php

    class pContacts {
        private $contacts;
        function __construct()
        {
            require_once "./core/contacts.php";
            $this->contacts = new Contacts("../");
        }

        public function get_contacts($fetch_rule = 1)
        {
            $contacts = $this->contacts->records($fetch_rule);
            foreach ($contacts as $contact) {
                $icon = $contact['status']==1? "check":"bullhorn";
                $bg = $contact['status']==1? "grey":"red";
                $eye = $contact['status']==1? "eye-slash":"eye";
                $eye_title = $contact['status']==1? "Mark as unread":"Mark as read";
                $url_sub = htmlentities($contact['subject'], ENT_QUOTES, 'UTF-8');
                echo "
                <li class='row'>
                <span class='notification-icon dashbg-{$bg}'>
                    <i class='fa fa-{$icon}'></i>
                </span>
                <a href='#{$contact['id']}' data-toggle='collapse' aria-expanded='true' aria-controls='{$contact['id']}'>
                    <span class='notification-text'>
                        <span>{$contact['name']} </span> __{$contact['subject']}
                    </span>
                </a>
                <span class='notification-time'>
                <a href='' class='fa fa-{$eye} status' title = '{$eye_title}'>
                    <form method = 'POST' class = 'status_reader'>
                        <input type = 'hidden' name = 'id' value = '{$contact['id']}'>
                        <input type = 'hidden' name = 'status' value = '{$contact['status']}'>
                    </form>
                </a>
                <span> {$this->contacts->getFullDate($contact['date'])}</span>
                </span>
                <div id='{$contact['id']}' class='collapse col-sm-12 col-md-12 mt-2' aria-labelledby='headingOne' data-parent='#accordion'>
                    <div class='card-body'>
                        <div class='row placeani'>
                            <div class='col-lg-4 mb-2 border-bottom'>
                                <label>
                                    <span class='fa text-success mr-2 fa-user'></span> {$contact['name']}
                                </label>
                            </div>
                            <div class='col-lg-5 mb-2 border-bottom'>
                                <label>
                                    <span class='fa text-success mr-2 fa-envelope'></span> <a href='mail-compose.php?email={$contact['email']}' class='text-dark'>{$contact['email']}</a>
                                </label>
                            </div>
                            <div class='col-lg-3 mb-2 border-bottom'>
                                <label>
                                    <span class='fa text-success mr-2 fa-phone'></span> {$contact['phone']}
                                </label>
                            </div>
                            <div class='col-lg-7 mb-2 border-bottom'>
                                <label class='font-weight-bold'>
                                    <span class='fa text-success mr-2 fa-comment-o'></span> {$contact['subject']}.
                                </label>
                            </div>
                            <div class='col-lg-5 mb-2 border-bottom'>
                                <label>
                                    <span class='fa text-success mr-2 fa-calendar'></span> {$this->contacts->getFullDateTime($contact['date'])}
                                </label>
                            </div>
                            <div class='col-lg-12 mb-2'>
                                {$contact['message']}
                            </div>
                                <div class='col-lg-8'>
                                    <a href='mail-compose.php?email={$contact['email']}&subject=RE- {$url_sub}' class='btn'><i class='ti-back-right'></i> Reply</a>
                                    <button type='reset' class='btn outline' data-target='#{$contact['id']}' data-toggle='collapse' aria-expanded='true' aria-controls='{$contact['id']}'><i class='ti-back-left'></i></button>
                                </div>
                        </div>
                    </div>
                </div>
            </li>
                ";
            }
        }
    }

    // $opr = new pContacts();
    // echo "<pre>";
    // var_dump($opr->get_contacts());
?>