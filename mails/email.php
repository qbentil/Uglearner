<?php

    require 'mailer/PHPMailerAutoload.php';
    require 'credential.php';
    require 'snippets.php';

    class Mailer extends PHPMailer{
        
        public function sendMail($to, $subject, $message){
            try {
                $this->SMTPDebug = 0;									
                $this->isSMTP();											
                $this->Host	 = 'mail.uglearner.com';					
                $this->SMTPAuth = true;							
                $this->Username = EMAIL;				
                $this->Password = PASSWORD;						
                $this->SMTPSecure = 'ssl';							
                $this->Port	 = 465;
                // $this->SMTPOptions = array(
                //     'ssl' => array(
                //         'verify_peer' => false,
                //         'verify_peer_name' => false,
                //         'allow_self_signed' => true
                //     )
                // );
        
                $this->setFrom('from'.EMAIL, 'UGLearner');		
                $this->addAddress($to['email'], $to['name']);
                $this->isHTML(true);								
                $this->Subject = $subject;
                $this->Body = message($message);        
                $this->SMTPSecure = 'ssl';
                $this->Host = 'mail.uglearner.com';
                
              if(!$this->send())
              {
                  return 0;
              }
              return 1;
              
            } catch (Exception $e) {
                return 0;
            }
        }

    }

    // $mail = new mailer();
    // $msg = "Thank you for subscribing to our newsletter! You will be receiving timly updates in courses and study materials from UGLEARNER.";
    // $to = array(
    //     "email" => "sbentil005@st.ug.edu.gh",
    //     "name" => "Quadjo Bentil"
    // );
    // // echo $to['email'];
    // echo $mail->sendMail($to, "UGLEARNER: Newsletter subscription", $msg)? "Sent": "Failed";

?>
