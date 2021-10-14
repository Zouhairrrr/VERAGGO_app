<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['submit'])) {



    $message = $_POST['message'];
    $email = $_POST['email'];

    if (empty($message) && empty($email)) {

        echo `<script>alert("please fill required feild")</script>`;
        return  header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        require 'vendor/autoload.php';
        $mail = new PHPMailer(true);
        try {
            $mail->isMAIL();
            $mail->Host       = 'hiver.50dh.net';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'contact@verrago.net';
            $mail->Password   = 'contactemail123';
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;     
            $mail->Port       = 465;
            //Recipients
            $mail->setFrom('contact@verrago.net', 'Contact us');
            $mail->addAddress('commercial@verrago.net', 'Commercial');
            $mail->addReplyTo('contact@verrago.net', 'Information');
            $mail->isHTML(true);
            $mail->Subject = 'Message sent from the website.';
            $mail->Body    = "$email<br><br>$message";

            $mail->send();

            header('Location: http://www.verrago.net/');

        } catch (Exception $e) {
            echo 'The message could not be sent.<br>Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
