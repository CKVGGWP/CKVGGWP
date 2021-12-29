<?php

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

    private function phpMailer()
    {
    }
}
