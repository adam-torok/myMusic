<?php
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
$username = "admin";
$password = "admin";

if(!isset($_SERVER['PHP_AUTH_USER']) and !isset($_SERVER['PHP_AUTH_PW']) and ($_SERVER['PHP_AUTH_USER'] != $username) and ($_SERVER['PHP_AUTH_PW'] != $password)){
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="myadmin"');
    exit('<h2>Sajnáljuk, nem megfelelő felhasználónév és jelszó.</h2>');
}
