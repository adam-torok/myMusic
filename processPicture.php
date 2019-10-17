<?php 
session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "qwert";
$dbname = "felhasznalo";
//csatlakozás felépítése
$link = @mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

$id = $_SESSION['id'];

if(isset($_POST['save_user'])){

 $bio = $_POST['bio'];
 $profileImageName = time(). '_'. $_FILES['profileImage']['name'];

$target = 'profileimages/' . $profileImageName;

 if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){
    $sql = "UPDATE felhasznalo SET bio = '$bio', profile_image = '$profileImageName' WHERE id='$id'";
    if(mysqli_query($link,$sql)){
        echo $_SESSION['id'];
        echo "<script> alert('Successful upload.')</script>.";     
    }
    else{
        echo "<script> alert('Upload failed to database.')</script>.";     
    }
  
 }else{
    echo "<script> alert('Failed upload.')</script>";     
}
}
?>