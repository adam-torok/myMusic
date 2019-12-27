<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("../COMPONENTS/headerMeta.php"); ?>
    <title>Engedélyezi?</title>
</head>
<body>
    <style>
    .wrapper{
    grid-template-columns:1fr;
    justify-content: center;
    align-items: center;
    justify-items: center;
    margin:3rem;
    }
    </style>
<div class="wrapper">
<?php
//require_once('authorize.php');
require_once("../CONFIG/config.php");

// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
    $id = $_GET['id'];
    $name = $_GET['name'];
    $query = "UPDATE songs SET approved = 1 WHERE id='$id'";
    mysqli_query($dbc,$query);
    mysqli_close();
    echo "<h1 style='color:white'>Név: ".$name. " ID: ".  $id. " Zene : Frissítve.";
    echo '<h2><a href="admin.php">Vissza az admin oldalra!</a></p>';
?>
</div>
<?php include_once("../COMPONENTS/footer.php");?>
</body>
</html>
