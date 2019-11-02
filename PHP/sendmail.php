<?php
include "config.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$email = mysqli_real_escape_string($link,$_POST['email']);
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
$sql = "INSERT INTO newsletter (email) values ('$email')";
if ($conn->query($sql)){
  $mail = new PHPMailer(true);
    //Server settings
    $mail->Username   = 'woltery99@gmail.com';              // SMTP felhnev
    $mail->Password   = '6addtehrdk';           // SMTP jelszó
    $mail->Port  = 587;                                    // TCP port ahova csatlakozik
    //Recipients
    $mail->setFrom('woltery99@gmail.com');                 //Kitől kapja az üzenetet
    $mail->Host = "smtp.gmail.com";                    
    $mail->SMTPSecure = 'tls';
    $mail->isSMTP();                        
    $mail->SMTPAuth = true; // This Must Be True
    $mail->CharSet = 'UTF-8';
    $mail->Mailer = "smtp";
    $mail->addAddress($email);                     // Felhasználó email címe
    $mail->addReplyTo('woltery99@gmail.com', 'Information');         //Kinek válaszoljon
    $mail->addCC('woltery99@outlook.hu');
    $mail->addBCC('wolter99@outlook.hu');             //kinek küldje el még
    // EMAIL KÜLDÉS
    $mail->isHTML(true);                          // Set email format to HTML
    $mail->Subject = 'Hírlevél';
    $mail->Body    = '<h1>Kedves feliratkozó!,</h1> <br>
    Köszönjük, hogy feliratkozott! <br>
    My music csapata!';
    
    
    $mail->AltBody = 'Köszönjük hogy minket választott'; // ez a body ha nem támogatja a böngésző a html emailt

    $mail->send();
    header("Location: index.html");

}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();


?>