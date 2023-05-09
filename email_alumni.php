<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'includes/Exception.php';
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';

if(isset($_POST['send'])){
    // $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $subject = htmlentities($_POST['subject']);
    $message = htmlentities($_POST['message']);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sharmaso1298@gmail.com';
    $mail->Password = 'wyefrdmllyeplxfv';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom('sharmaso1298@gmail.com');
    $mail->addAddress($email);
    $mail->Subject = ($subject);
    $mail->Body = $message;
    $mail->send();

    // header("Location: ./response.html");
    echo "<script> alert('Mail sent.')</script>";
    header("Refresh:0.05; url= main2.php");
}
?>
