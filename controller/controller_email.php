<?php

require('../manager/send_email.php');

if (isset($_POST)) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $send = new Email($name, $email, $subject, $message);

    $sent = $send->sendEmail();
}
