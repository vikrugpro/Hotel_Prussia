<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->ChartSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);

$mail->setFrom('info@book.ru', 'Сайт');
$mail->addAddress('irina.peslyak.1864@gmail.com');
$mail->Subject = 'Новое бронирование!'

$body = '<h1>Новое бронирование!</h1>';

if(trim(!empty($_POST['date1']))) {
 $body.='<p><strong>Дата заезда:</strong> '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['date2']))) {
 $body.='<p><strong>Дата выезда:</strong> '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['name']))) {
 $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['email']))) {
 $body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['tel']))) {
 $body.='<p><strong>Телефон:</strong> '.$_POST['tel'].'</p>';
}
if(trim(!empty($_POST['room']))) {
 $body.='<p><strong>Номер:</strong> '.$_POST['room'].'</p>';
}
if(trim(!empty($_POST['adult']))) {
 $body.='<p><strong>Взрослых:</strong> '.$_POST['adult'].'</p>';
}
if(trim(!empty($_POST['child']))) {
 $body.='<p><strong>Детей:</strong> '.$_POST['child'].'</p>';
}
if(trim(!empty($_POST['message']))) {
 $body.='<p><strong>Ваши пожелания, вопросы:</strong> '.$_POST['message'].'</p>';
}

$mail->Body = $body;

if (!$mail->send()) {
$message = 'Ошибка';
} else {
$message = 'Данные отправлены!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>