<?php
include "config.php";
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$email = filter_input(INPUT_POST, 'email');

if (!empty($username)){
if (!empty($password)){
if (!empty($email)){

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO $dbname (felhnev, jelszo, email)
values ('$username','$password', '$email')";
if ($conn->query($sql)){
  header("Location: loginlayout.php");
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
die();

}
?>