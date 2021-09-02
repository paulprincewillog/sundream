<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer.php';
    require 'PHPMailer-SMTP.php';
    require 'PHPMailer-Exception.php';

    Class mail {
        
        private $mail;
        private $host = EMAIL_HOST; 
        private $username;
        private $password;
        public $sender = "Your website";
        public $receiver = ADMIN_EMAIL;

        public $subject;
        public $body;
        public $alt_body = "";

        public $isSuccessful = false;
        public $feedback = "";
        
        function __construct() {

            global $db;
            $this->mail = new PHPMailer(true);

            // Get email and password from database
            // This was done so that email details in config file will not be uploaded to GitHub public folder
            $db->sql("SELECT value FROM data WHERE title='email_username'");
            $email = $db->getData();
            $this->username = $email['value'];

            $db->sql("SELECT value FROM data WHERE title='email_password'");
            $email = $db->getData();
            $this->password = $email['value'];
        }

        private function set() {

            //Server settings
            // $this->mail->SMTPDebug = SMTP::DEBUG_CONNECTION;                      // Enable verbose debug output
            $this->mail->isSMTP();                                            // Send using SMTP
            $this->mail->Host       = $this->host;                    // Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->mail->Username   = $this->username;                     // SMTP username
            $this->mail->Password   = $this->password;          
            
            if (strpos($this->host, "gmail") !== false) {
                // SMTP password
                $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $this->mail->Port       = 465; //25;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            } else {
                $this->mail->Port       = 25;
            }        

            //Recipients
            $this->mail->setFrom($this->username, $this->sender);
            $this->mail->addAddress($this->receiver, $this->receiver);

            // Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = $this->subject;
            $this->mail->Body    = $this->body; //'This is the HTML message body <b>in bold!</b>';
            $this->mail->AltBody = $this->alt_body; //'This is the body in plain text for non-HTML mail clients';

        }
        
        public function send() {
            
            $this->set();

            try {
                
                $this->mail->send();
                $this->isSuccessful = true;
                $this->feedback = "Mail was successfully sent";
                
            } catch (Exception $e) {

                // echo "Message could not be sent. Contact admin "; //. Mailer Error: {$this->mail->ErrorInfo}";
            
                $this->isSuccessful = false;
                $this->feedback = $this->mail->ErrorInfo;// "Failed to send email, Call instead"; 
            }
        }

    }
        

$mail = new mail;
$GLOBALS['mail'] = $mail;