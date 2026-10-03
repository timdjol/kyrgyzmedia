<?php
// Файлы phpmailer
require 'class.phpmailer.php';
require 'class.smtp.php';

$oid = $_POST['oid'];
$merchantName = $_POST['merchantName'];
$amount = $_POST['amount'];
$currency = $_POST['currency'];
$authcode = $_POST['AuthCode'];
$maskedpan = $_POST['MaskedPan'];
$useremail = $_POST['Email'];

header("Content-Type: text/html; charset=utf-8");
// Настройки
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';

$mail->isSMTP(); 
$mail->Host = 'smtp.beget.com';  
$mail->SMTPAuth = true;                      
$mail->Username = 'support@kyrgyzmedia.kg'; // Ваш логин в Яндексе. Именно логин, без @yandex.ru
$mail->Password = ''; // Пароль почты задаётся только на сервере, в репозиторий не кладётся
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 465;
$mail->setFrom('support@kyrgyzmedia.kg'); // Ваш Email
$mail->addAddress($useremail); // Email получателя
// Письмо
$mail->isHTML(true); 
$mail->Subject = "KyrgyzMedia"; // Заголовок письма
$mail->Body    = "<table style='width: 100%;'>
<tr style='background-color: #f8f8f8;'>
<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Номер документа, число, месяц и год его выписки:</b></td><td style='padding: 10px; border: #e9e9e9 1px solid;'>$oid</td> 
</tr>
<tr style='background-color: #f8f8f8;'>
<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Наименование (код) торговой точки или эквайера:</b></td><td style='padding: 10px; border: #e9e9e9 1px solid;'>$merchantName</td> 
</tr>
<tr style='background-color: #f8f8f8;'>
<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Сумма платежа:</b></td><td style='padding: 10px; border: #e9e9e9 1px solid;'>$amount</td> 
</tr>
<tr style='background-color: #f8f8f8;'>
<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Валюта платежа:</b></td><td style='padding: 10px; border: #e9e9e9 1px solid;'>$currency</td> 
</tr>
<tr style='background-color: #f8f8f8;'>
<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Код авторизации:</b></td><td style='padding: 10px; border: #e9e9e9 1px solid;'>$authcode</td> 
</tr>
<tr style='background-color: #f8f8f8;'>
<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Реквизиты Платежной карты:</b></td><td style='padding: 10px; border: #e9e9e9 1px solid;'>$maskedpan</td> 
</tr>
</table>


"; // Текст письма

// Результат
if(!$mail->send()) {
    echo 'Письмо не отправлено';
    echo 'Ошибка: ' . $mail->ErrorInfo;
} else { 
    echo '<h1>Письмо отправлено!</h1>';
}
?>

<style type="text/css" media="screen">
    body{
        background-color: #074c82;
    }
	h1 {
		position: absolute;
		width: 100%;
		left: 0;
		top: 50%;
		margin-top: -10px;
		text-align: center;
		color: #fc982f;
	}
</style>
<script>
        setTimeout(function () {
           window.location.href= 'http://kyrgyzmedia.kg/'; 
        },3000); 
    </script>