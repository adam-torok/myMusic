<?php
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki

require_once('CONFIG/config.php');
$username = $_POST['username'];
$password = $_POST['password'];
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
$sql="SELECT * FROM felhasznalo WHERE username='$username'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $username and $password, table row must be 1 row
if($count==1){
    $row = mysql_fetch_assoc($result);
    if (crypt($password, $row['password']) == $row['password']){
        session_register("username");
        session_register("password");
        echo "Login Successful";
        return true;
    }
    else {
        echo "Wrong Username or Password";
        return false;
    }
}
else{
    echo "Wrong Username or Password";
    return false;
}
