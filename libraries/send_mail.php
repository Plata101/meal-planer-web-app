<?php
session_start();
$filename = $_SESSION['filename'];
require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'miegstroem@gmail.com'; // SMTP username
$mail->Password = '******'; // SMTP password
$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // TCP port to connect to

$mail->setFrom('Luca@Fithealth', 'LucaFithealth Vegan Diet Planer');
$mail->addAddress( $email ); // Add a recipient

// get created pdf    *****Add Full Path to mealplans folder****
$mail->addAttachment("/Applications/MAMP/htdocs/luca-fithealth-app/html_to_pdf2/mealplans/$filename", 'mealplan.pdf');
$mail->isHTML(true); // Set email format to HTML

$mail->Subject = 'Thank you for purchasing your personal Vegan Meal Planer';
$mail->Body    = "We are very glad, that you aquired your personal meal plan.
                  We are certain you will achieve your goal if you stick to the plan";
$mail->AltBody = "We are very glad, that you aquired your personal meal plan.
                  We are certain you will achieve your goal if you stick to the plan";
if(!$mail->send()) {
    $_SESSION['message'] = "Server couldnt send confirmation email";
    header ('Location: 404.php');
    } else {
    header ('Location: thank-you.php');
    }
