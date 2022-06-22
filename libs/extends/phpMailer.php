<?php
class Mailer{
    private $fullname;
    private $email;
    private $title;
    private $message;

    public function __construct($e_fullname, $e_email, $e_title, $e_message)
    {
        $this->fullname = $e_fullname;
        $this->email    = $e_email;
        $this->title    = $e_title;
        $this->message  = $e_message;
    }
    
    public function sendMail(){
        require_once "vendor/phpmailer/phpmailer/src/PHPMailer.php";
        require_once "vendor/phpmailer/phpmailer/src/SMTP.php";
        require_once "vendor/phpmailer/phpmailer/src/Exception.php";

        //Load Composer's autoloader
        require 'vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        try {
            //Server settings
            $mail->CharSet      = 'UTF-8';
            $mail->SMTPDebug    = 0;                                       //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host         = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth     = true;                                   //Enable SMTP authentication
            $mail->Username     = 'n.nquanght@gmail.com';                 //SMTP username
            $mail->Password     = 'eucujedferdjniav';                     //SMTP password
            $mail->SMTPSecure   = 'tls';                                  //Enable implicit TLS encryption
            $mail->Port         = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('n.nquanght@gmail.com', 'JOBHT-HutechJob');
            $mail->addAddress($this->email, $this->fullname);       //Add a recipient
            // $mail->addAddress('ellen@example.com');                  //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');            //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');       //Optional name

            //Content
            $mail->isHTML(true);                                        //Set email format to HTML
            $mail->Subject = $this->title;
            $mail->Body    = FormBackEnd::formEmail($this->message);

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
