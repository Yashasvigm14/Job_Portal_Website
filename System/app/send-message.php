<?php
include '../constants/settings.php';

$myfname = ucwords($_POST['fullname']);
$myemail = $_POST['email'];
$mymessage = $_POST['message'];

require '../mail/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = $smtp_host;
$mail->SMTPAuth = true;
$mail->Username = $smtp_user;
$mail->Password = $smtp_pass;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom($myemail, $myfname);
$mail->addAddress($contact_mail);

$mail->isHTML(true);

$mail->Subject = 'Contact';
$mail->Body = $mymessage;
$mail->AltBody = $mymessage;

// Enable SMTP debugging
$mail->SMTPDebug = 2; // Enable verbose debugging
$mail->Debugoutput = 'html'; // Display debugging output in HTML format

if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo; // Display the detailed error message
    header("location:../contact.php?r=2974");
} else {
    echo 'Message sent!';
    header("location:../contact.php?r=5634");
}
?>
