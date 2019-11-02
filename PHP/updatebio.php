<?php 
session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "qwert";
$dbname = "felhasznalo";
//csatlakozás felépítése
$link = @mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
$id = $_SESSION['id'];
$bio = $_SESSION['bio'];
if(isset($_POST['save_user'])){
    $sql = "UPDATE felhasznalo SET bio = '$bio' WHERE id='$id'";
    if(mysqli_query($link,$sql)){
        echo $_SESSION['id'];
        echo "<script> alert('Bio updated.')</script>.";     
    }
    else{
        echo "<script> alert('Upload failed to database.')</script>.";     
    }
 }

?>