<?php
require_once('authorize.php');
require_once("config.php");

    $id = $_GET['id'];

    $dbc = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
    $query = "UPDATE songs SET approved = 1 WHERE id='$id'";
    mysqli_query($dbc,$query);
    mysqli_close();
    echo $id."song is updated.";



echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';