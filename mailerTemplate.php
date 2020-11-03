<?php

	require_once('PHPMailer/PHPMailerAutoload.php');

	$mail=new PHPMailer();
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure='ssl';
	$mail->Host='smtp.gmail.com';
	$mail->Port='465';
	$mail->isHTML();
	$mail->Username='europa.meer@gmail.com';
	$mail->Password='LA$E1%1$';
	$mail->SetFrom('no-reply@phpmailer.org');
	$mail->Subject='HTMLp1c title here';
	$mail->Body='<html><h1>Title</h1><p><b><i>Paragraph1</b></i></p><p>Paragraph2</p></html>';
	$mail->AddAddress('tanvir98.mt@gmail.com');
	$mail->addAttachment('a.png', 'new.png');

	$mail->Send();
		
?>