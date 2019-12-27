<?php
session_start();
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
require_once('../CONFIG/config.php');
//csatlakozás felépítése
$id = $_SESSION['id'];
if(isset($_POST['save_user'])){
$profileImageName = $_FILES['profile_image']['name'];
$profileImageName = strtolower($profileImageName);
$profileImageName = trim($profileImageName);
$target = 'C:\wamp64\www\mymusic\PROFILEIMAGES/' . $profileImageName;
if(move_uploaded_file($_FILES['profile_image']['tmp_name'],$target)){
    $sql = "UPDATE felhasznalo SET profile_image = '$profileImageName' WHERE id='$id'";
    if(mysqli_query($dbc,$sql)){
      echo "<div id='popup' class='pop-up'>
          <h3>Sikeres frissítés!</h3>
          <p>Sikeresen feltölttél egy zenét, már csak az admin jóváhagyása szükséges! </p>
          <a onclick='closePopUp()' id='disable' class='material-button'>Rendben</a>
        </div>";
    }
    else{
        echo "<script> alert('Sikertelen)</script>.";
    }
}else{
    echo "<script> alert('Sikertelen feltöltés.')</script>";
}
}
?>
