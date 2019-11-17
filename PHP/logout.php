<?php
session_start();
if(isset($_SESSION['id'])){ //Megnézem hogy van e egyáltalán belépve user
    $_SESSION = array();  //A munkameneti változók törléséhez egy üres tömbre állítom a sessiont
}
if(isset($_COOKIE[session_name()])){
    //Ha létezik munkameneti süti, törlöm a lejárati idejének korábbra állításával.
    setcookie(session_name(),"",time() - 3600);
}
session_destroy();
header("Location: ../HTML/index.html");
?>