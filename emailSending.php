<?php

session_start();

?>


<?php


session_start();

?>


<?php
include('./smtp/PHPMailerAutoload.php');

// Generate a random 6-digit OTP


// Modify the message to include the OTP
$msg = "Hi, $uName. Welcome To our website enjoy your day ";

echo smtp_mailer($email, 'Welcome To Our Sweet Shop', $msg);

function smtp_mailer($to, $subject, $msg) {
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587;
	// $mail->SMTPDebug = 2;
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	// $mail->SMTPDebug = 2;
	$mail->Username = "hgandhi1810@gmail.com";
	$mail->Password = "lizmefabcskdpnqz";
	$mail->SetFrom("hgandhi1810@gmail.com");
	$mail->Subject = $subject;
	$mail->Body = $msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions = array('ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => false
	));
	if (!$mail->Send()) {
		echo "Email Sending Failed";
	} else {
		$_SESSION['message'] = "Check Your Mail to Activate Your Account $email";
		header('location:login.php');
	}
}


?>