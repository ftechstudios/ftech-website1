<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contact.ftechstudios20@gmail.com';                     //SMTP username
    $mail->Password   = 'lkfzqifbunhekeez';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Ftechstudios-Git/Netlify');
    $mail->addAddress('ftechstudios20@gmail.com');     //Add a recipient    
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // $message = "Name ".$name."\n"."Email ".$email;


    //Content
    $mail->isHTML(true);                                    //Set email format to HTML
    $mail->Name = $_POST["name"];
    $mail->Email = $_POST["email"];
    $mail->Subject = 'Message from ftechstudios';

    $mail->Body    = 'Name: ' . $name .  '<br>' . 'Email: ' . $email . '<br>' . 'Message: ' . $_POST["message"];
    // $mail->Body    =  $_POST["message"];
    
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    echo "Message has been sent successfully";
    // echo
    // "
    // <script> 
    // alert('Sent Successfully');
    // document.location.href = 'index.php';
    // </script>
    // ";

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
