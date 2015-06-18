<?php
ini_set('memory_limit','32M');
include('../helpers/mpdf/mpdf.php');
$mpdf=new mPDF();

$pdfData = isset($_POST['pdf_data'])?$_POST['pdf_data']:'';

$stylesheet = file_get_contents('../view/css/admin_page.css');
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($pdfData,2);
// $mpdf->Output('filename.pdf','F');

$content = $mpdf->Output('', 'S');
$content = chunk_split(base64_encode($content));
$mailto = 'a.chornaya@gmail.com';
$mailto = isset($_POST['email_to'])?$_POST['email_to']:$mailto;
$from_name = 'Alyona';
$from_mail = 'la_nube@mail.ru';
$from_mail = isset($_POST['email_from'])?$_POST['email_from']:$from_mail;
$replyto = $from_mail;
$uid = md5(uniqid(time())); 
$subject = 'LOOK AT THIS AWESOME PDF';
$message = 'LOOK!!I\'ve added CSS!!';
$filename = 'offer_page.pdf';

$header = "From: ".$from_name." <".$from_mail.">\r\n";
$header .= "Reply-To: ".$replyto."\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
$header .= "This is a multi-part message in MIME format.\r\n";
$header .= "--".$uid."\r\n";
$header .= "Content-type:text/plain; charset=utf-8\r\n";
$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$header .= $message."\r\n\r\n";
$header .= "--".$uid."\r\n";
$header .= "Content-Type: application/pdf; name=\"".$filename."\"\r\n";
$header .= "Content-Transfer-Encoding: base64\r\n";
$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
$header .= $content."\r\n\r\n";
$header .= "--".$uid."--";
$is_sent = @mail($mailto, $subject, "", $header);
$mpdf->Output();
exit;
?>