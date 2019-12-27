<?php
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "felhasznalo";

//csatlakozás felépítése
$dbc = @mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
if($dbc){
  mysqli_set_charset($dbc,"utf8");
}
?>
