<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php';

$name = $_POST['userName'];
$email = $_POST['userEmail'];
$subject = $_POST['userSubject'];
$message = $_POST['userMessage'];

$mail = new PHPMailer(true);

//Server settings
$mail->isSMTP();                                            // Send using SMTP
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = 'drcode0dev';         // SMTP username
$mail->Password   = 'oriqteviahjsamec';                   // SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

//Recipients
$mail->setFrom($email, $name);
$mail->addAddress('drcode0dev@gmail.com');        // Add a recipient

// Content
$mail->isHTML(true);                                        // Set email format to HTML
$mail->Subject = $subject;
$mail->Body    = "Name: $name<br>Email: $email<br>Subject: $subject<br>Message: $message<br>";
$success = $mail->send();

if ($success) {
    $result = ['result' => 'success'];
} else {
    $result = ['result' => 'error'];
}

header('Content-Type: application/json');
echo json_encode($result);
?>
