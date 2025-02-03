<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require dirname(__DIR__) . '/vendor/autoload.php';


function sendMail(string $heading, string $message)
{
  $mail = new PHPMailer(true);

  try {
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'villegasalazar10@gmail.com';
    $mail->Password   = 'webr fwnv twmt utcr';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    $mail->setFrom('villegasalazar10@gmail.com', 'Electrocopper');
    $mail->addAddress('villegasalazar01@gmail.com', 'Luis Villegas');

    $mail->isHTML(true);
    $mail->Subject = $heading;
    $mail->Body    = $message;
    $mail->AltBody = 'Hola, este es el contenido del correo en formato de texto. Si ves esto, es porque tu cliente de correo no admite HTML.';

    $mail->send();
  } catch (Exception $e) {
    return ["success" => false];
  }
}
