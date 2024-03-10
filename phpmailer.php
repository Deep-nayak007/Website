<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = 2;									
	$mail->isSMTP();											
	$mail->Host	 = "mail.tarunainfosoft.com";					
	$mail->SMTPAuth = true;							
	$mail->Username = "sms@tarunainfosoft.com";				
	$mail->Password = "Taruna@007";						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;

	$mail->setFrom("sms@tarunainfosoft.com", "CA Portal");		
	$mail->addAddress("d983693@gmail.com");
	$mail->addAddress("d983693@gmail.com", "Deep");
	
	$mail->isHTML(true);								
	$mail->Subject = "Got your Request";
	$mail->Body = "hello we have received your request please wait we will inform you shortly ";
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>