<?php
if (!isset($_SESSION)) {
  session_start();
}
?>

<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->isSMTP();
  $mail->Host       = 'smtp.gmail.com';
  $mail->SMTPAuth   = true;
  $mail->Username   = '';
  $mail->Password   = '';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port       = 587;

  //Recipients
  $mail->setFrom('', 'Legitimate Business');
  $mail->addAddress($_SESSION['EMAIL']);     //Add a recipient

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Email verification';
  $mail->Body    = 'Confirm your email by following this link: http://localhost/lab4-Nika11876/activate-user.php?token=' . $_SESSION['TOKEN'];
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if ($_SESSION['TRIES'] > 0) {
    $mail->send();
    $canSend = 1;
    $_SESSION['TRIES'] -= 1;
  } else {
    $cantSend = 1;
  }
  include 'register.php';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}