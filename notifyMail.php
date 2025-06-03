<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function sendMail($to, $name, $amount, $billTitle , $from)
{
    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USERNAME'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        $mail->setFrom($from, 'Bill Splitter Wizard');
        $mail->addAddress($to, $name);
    
        $mail->isHTML(true);
        $mail->Subject = 'Payment Reminder';
        $mail->Body = "Hi <strong>$name</strong>,<br>Your share of the bill titled <strong>$billTitle</strong> is <strong>₹$amount</strong>.<br>Please pay it soon!";

    
        $mail->SMTPDebug = 0; // Set to 2 to see detailed debug output
    
        $mail->send();
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

?>