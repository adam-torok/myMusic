<?php
require_once('config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


if(isset($_POST['email']) AND isset($_POST['username'])){
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $uname = mysqli_real_escape_string($conn,$_POST['username']);
    // Create connection
   
    $sql = "SELECT jelszo FROM felhasznalo WHERE email = '$email' AND felhnev = '$uname'";
    $result = mysqli_query($conn,$sql);
    $pass = mysqli_fetch_assoc($result);
    if ($conn->query($sql)){
        $mail = new PHPMailer(true);
        //Server settings
        $credens = parse_ini_file('credentials.ini');                  // Az ini filet webrooton kívülre kell helyezni
        $mail->Username   = $credens['username'];              // SMTP felhnev
        $mail->Password   = $credens['password'];         // SMTP jelszó
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
        $mail->Body    = '<h1>Kedves felhasználó!,</h1> <br> 
        Sajnáljuk a dolgot, a jelszója!  <br> '.$pass['jelszo'].'<br> 
        My music csapata!';
        
        
        $mail->AltBody = 'Köszönjük hogy minket választott'; // ez a body ha nem támogatja a böngésző a html emailt
    
        $mail->send();
        header("Location: ../HTML/index.html");
        
    
    }

else{
    echo "Error: ". $sql ."
    ". $conn->error;
    }
    $conn->close();
    
}
else{
    echo "Need username / email";
}


?>