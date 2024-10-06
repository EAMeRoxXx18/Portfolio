<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);
if($_SERVER["REQUEST_METHOD"]=="POST"){


$nombre=$_POST['nombre'];
$phone=$_POST['telefono'];
$email=$_POST['email'];
$asunto=$_POST['asunto'];
$mensaje=$_POST['mensaje'];
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'alfonsomedinaupt18@gmail.com';                     //SMTP username
    $mail->Password   = 'isiw hnqs hpwk ofpx';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email, $nombre);
    $mail->addAddress('alfonsomedinaupt18@gmail.com');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $mensaje .'<br>'. 'Te dejo mi numero de Contacto     ' . $phone;;
   
   

    $mail->send();
    // echo 'Mensaje Enviado';
    header("location: index.html");
} catch (Exception $e) {
    echo "Error mi buen {$mail->ErrorInfo}";
}

}