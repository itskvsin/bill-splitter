<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


function sendMail($to, $name, $amount, $billTitle)
{
    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'solankikevin103@gmail.com';
        $mail->Password = 'dpsv hjuo qrzg jmdl';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        $mail->setFrom('kevinsolankissg@gmail.com', 'Bill Splitter Wizard');
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