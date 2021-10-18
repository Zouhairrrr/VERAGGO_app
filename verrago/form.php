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
        $mail->Host       = 'hiver.50dh.net';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'contact@verrago.net';
        $mail->Password   = 'contactemail123';    
        $mail->Port       = 465;
        $mail->setFrom('contact@verrago.net', 'Contact us');
        $mail->addAddress('contact@verrago.net', 'Contact Us');
        $mail->addReplyTo('contact@verrago.net', 'Information');
        $mail->isHTML(true);
        $mail->Subject = 'Message sent from the website.';
        $mail->Body    = "$email<br><br>$message";
        $mail->send();
        $sendmail = $mail;
        if ($sendmail) {
            $res = [
              "status" => "success",
              "message" => "Add successfully",
            ];
            echo json_encode($res);
        } else {
            $res = [
              "status" => "error",
              "message" => "The message could not be sent.",
            ];
            echo json_encode($res);
        }
    } catch (Exception $e) {
        echo 'The message could not be sent.<br>Mailer Error: ', $mail->ErrorInfo;
    }
}

echo 'jjsd';