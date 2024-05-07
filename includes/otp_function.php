<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
function sendOTP($email, $otp)
{
  $mail = new PHPMailer(true);
  $message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp;
  //Server settings
  $mail->SMTPDebug = SMTP::DEBUG_OFF;                     //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'sagarpatel19@gnu.ac.in';                     //SMTP username
  $mail->Password   = 'rkwiacpnuiqrbpxk';                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->SetFrom("sagarpatel19@gnu.ac.in", "E-SHOPPER VERIFICATION");
  $mail->addReplyTo($email, 'E-Shopper');
  $mail->addAddress($email);     //Add a recipient


  //Content
  $mail->isHTML(true); //Set email format to HTML
  $mail->Subject = 'OTP for Login';
  $mail->Body    = $message_body;

  $result = $mail->send();
  return $result;
}

// <?php

// use \vendor\phpmailer\phpmailer\PHPMailer;
// use \vendor\PHPMailer\PHPMailer\SMTP;
// use \vendor\PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';

// function sendOTP($email, $otp)
// {
//   require("phpmailer.php");
//   require("smtp.php");

//   $message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp;
//   $mail = new PHPMailer(true);
//   $mail->addReplyTo('sagarpatel19@gnu.ac.in', 'EShopper');
//   //$mail->setFrom('sagarpatel19@gnu.ac.in','EShopper')
//   $mail->addAddress($email);
//   $mail->subject = "OTP is Login";
//   $mail->msgHTML($message_body);
//   $result = $mail->send();
//   if (!$result) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
//   } else {
//     return $result;
//   }
// }