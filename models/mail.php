<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require dirname(__DIR__) . "/config/env.php";
require dirname(__DIR__) . '/vendor/autoload.php';

function sendMail(string $heading, string $message)
{
  $mail = new PHPMailer(true);

  try {
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host       = $_ENV["MAIL_HOST"];
    $mail->SMTPAuth   = true;
    $mail->Username   = $_ENV["MAIL_USERNAME"];
    $mail->Password   = $_ENV["MAIL_PASSWORD"];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = $_ENV["MAIL_PORT"];;

    $mail->setFrom($_ENV["MAIL_USERNAME"], $_ENV["MAIL_NAME"]);
    $mail->addAddress($_ENV["MAIL_FROM_ADDRESS"], $_ENV["MAIL_FROM_NAME"]);

    $mail->isHTML(true);
    $mail->Subject = $heading;
    $mail->Body    = $message;
    $mail->AltBody = 'Hola, este es el contenido del correo en formato de texto. Si ves esto, es porque tu cliente de correo no admite HTML.';

    $mail->send();
  } catch (Exception $e) {
    return ["success" => false];
  }
}
