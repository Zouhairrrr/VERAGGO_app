<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['submit'])) {
    $message = $_POST['message'];
    $email = $_POST['email'];
    require 'vendor/autoload.php';
    $mail = new PHPMailer(true);
    try {
        $mail->isMAIL();
        $mail->Host       = 'domain.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'contact@exemple.com';
        $mail->Password   = 'password';
        $mail->Port       = 412;
        $mail->setFrom('contact@exemple.com', 'Contact us');
        $mail->addAddress('contact@exemple.com', 'Contact Us');
        $mail->addReplyTo('contact@exemple.com', 'Information');
        $mail->isHTML(true);
        $mail->Subject = 'Message sent from the website.';
        $mail->Body    = "$email<br><br>$message";
        $mail->send();
        $sendmail = $mail;
        header("Access-Control-Allow-Origin: *");
        if ($sendmail) {
            echo "success";
        } else {
            echo 'error';
        }
    } catch (Exception $e) {
        echo 'The message could not be sent.<br>Mailer Error: ', $mail->ErrorInfo;
    }
}
