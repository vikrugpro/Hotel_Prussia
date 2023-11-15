<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->ChartSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);

$mail->setFrom('info@book.ru', '—айт');
$mail->addAddress('irina.peslyak.1864@gmail.com');
$mail->Subject = 'Ќовое бронирование!'

$body = '<h1>Ќовое бронирование!</h1>';

// проверить по документации обращени€
if(trim(!empty($_POST['date1']))) {
 $body.='<p><strong>ƒата заезда:</strong> '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['date2']))) {
 $body.='<p><strong>ƒата выезда:</strong> '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['name']))) {
 $body.='<p><strong>»м€:</strong> '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['email']))) {
 $body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['tel']))) {
 $body.='<p><strong>“елефон:</strong> '.$_POST['tel'].'</p>';
}
if(trim(!empty($_POST['room']))) {
 $body.='<p><strong>Ќомер:</strong> '.$_POST['room'].'</p>';
}
if(trim(!empty($_POST['adult']))) {
 $body.='<p><strong>¬зрослых:</strong> '.$_POST['adult'].'</p>';
}
if(trim(!empty($_POST['child']))) {
 $body.='<p><strong>ƒетей:</strong> '.$_POST['child'].'</p>';
}
if(trim(!empty($_POST['message']))) {
 $body.='<p><strong>¬аши пожелани€, вопросы:</strong> '.$_POST['message'].'</p>';
}

$mail->Body = $body;

if (!$mail->send()) {
$message = 'ќшибка';
} else {
$message = 'ƒанные отправлены!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>