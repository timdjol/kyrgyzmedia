<?php 
require_once 'vendor/autoload.php';
$oid = $_POST['oid'];
$merchantName = $_POST['merchantName'];
$amount = $_POST['amount'];
$currency = $_POST['currency'];
$authcode = $_POST['AuthCode'];
$maskedpan = $_POST['MaskedPan'];

$mpdf = new \Mpdf\Mpdf();
//Create our PDF
$data = '';

$data .='<div style="margin-top: 10px;"><b>Номер документа, число, месяц и год его выписки:</b> ' . $oid . '</div>';
$data .='<div style="margin-top: 10px;"><b>Наименование (код) торговой точки или эквайера:</b> ' . $merchantName . '</div>';
$data .='<div style="margin-top: 10px;"><b>Сумма платежа:</b> ' . $amount . '</div>';
$data .='<div style="margin-top: 10px;"><b>Валюта платежа:</b> ' . $currency . '</div>';
$data .='<div style="margin-top: 10px;"><b>Код авторизации:</b> ' . $authcode . '</div>';
$data .='<div style="margin-top: 10px;"><b>Реквизиты Платежной карты:</b> ' . $maskedpan . '</div>';
$data .= '</div>';

//Write PDF
$mpdf->WriteHTML($data);
//$pdf = $mpdf->Output('', 'S');

$mpdf->Output();

?>