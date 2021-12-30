<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');
require('../includes/info.php');

class Email
{
    private $name;
    private $email;
    private $subject;
    private $message;

    public function __construct($name, $email, $subject, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function sendEmail()
    {
        if ($this->checkName() == false) {
            echo 2;
            exit();
        }

        if ($this->checkEmail() == false) {
            echo 3;
            exit();
        }

        if ($this->checkSubject() == false) {
            echo 4;
            exit();
        }

        if ($this->checkMessage() == false) {
            echo 5;
            exit();
        }

        if ($this->checkName() == true && $this->checkEmail() == true && $this->checkSubject() == true && $this->checkMessage() == true) {
            $this->mailMe();
            echo 'OK';
            exit();
        }
    }

    private function checkName()
    {
        $nameRegex = '/^[A-Za-z_ .]+$/';
        if (preg_match($nameRegex, $this->name)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function checkEmail()
    {
        $result = '';
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function checkSubject()
    {
        $result = '';
        if (!empty($this->subject)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function checkMessage()
    {
        $result = '';
        if (!empty($this->message)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function mailMe()
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = userName();                     //SMTP username
            $mail->Password   = password();                               //SMTP password
            $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
            $mail->Port       = 587;                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(userName(), 'Portfolio Website');
            $mail->addAddress(to());     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $this->subject;
            $email_header = "<h3>Hi! " . "<b>" . $this->name . "</b> sent you a message!" . ',</h3>';
            $email_message = $this->message . "<br>";
            $email_message2 = 'Reply to this email : ' . $this->email . '<br>';
            $email_footer = "This is a system generated message. Please do not reply.";
            $email_template = $email_header . $email_message . $email_message2 .  $email_footer;
            $mail->Body = $email_template;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
