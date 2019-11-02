<?php
include "config.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
ini_set('display_errors', '1');
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$email = filter_input(INPUT_POST, 'email');

if (!empty($username)){
if (!empty($password)){
if (!empty($email)){

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
$sql = "INSERT INTO $dbname (felhnev, jelszo, email) values ('$username','$password', '$email')";
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
    $mail->Subject = 'Sikeres regrisztáció';
    $mail->Body    = '<h1>Kedves '.$username.',</h1> <br>
    Köszönjük, hogy regisztrált! <br>
    My music csapata!';
    
    
    $mail->AltBody = 'Köszönjük hogy minket választott'; // ez a body ha nem támogatja a böngésző a html emailt

    $mail->send();
    
   



  header("Location: ../HTML/loginlayout.html");
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
}
?>