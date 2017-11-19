<?php

use PHPMailer\PHPMailer\PHPMailer;

require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

$mailer = new PHPMailer;
$mailer->isSMTP();
$mailer->Host = 'smtp.mail.ru';
$mailer->SMTPAuth = true;
$mailer->Username = 'misterburger@inbox.ru';
$mailer->Password = '874bJ0Qc9GAv';
$mailer->SMTPSecure = 'ssl';
$mailer->Port = 465;
$mailer->setFrom('misterburger@inbox.ru', 'Mister Burger');
$mailer->addAddress($email);
$mailer->isHTML(true);
$mailer->CharSet = "utf-8";
$mailer->Subject = 'Заказ у Мистера Бургера';
$mailer->Body = $message;
$mailer->send();
