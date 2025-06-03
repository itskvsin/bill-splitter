<?php
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

function sendMail($to, $name, $amount, $billTitle)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USERNAME'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $_ENV['MAIL_PORT'];

        $mail->setFrom($_ENV['MAIL_FROM'], $_ENV['MAIL_FROM_NAME']);
        $mail->addAddress($to, $name);

        $mail->isHTML(true);
        $mail->Subject = 'Payment Reminder';
        $mail->Body = "Hi <strong>$name</strong>,<br>Your share of the bill titled <strong>$billTitle</strong> is <strong>₹$amount</strong>.<br>Please pay it soon!";
        $mail->AltBody = "Hi $name,\nYour share of the bill titled '$billTitle' is ₹$amount.\nPlease pay it soon!";

        $mail->send();
    } catch (Exception $e) {
        error_log('Mailer Error: ' . $mail->ErrorInfo);
        // Optionally show user-friendly message
        echo "Could not send email. Please try again later.";
    }
}

?>
