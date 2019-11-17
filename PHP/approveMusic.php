<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../HTML/CSS/main.css">
    <link rel="stylesheet" href="../HTML/CSS/fonts.css">
    <link rel="stylesheet" href="../HTML/CSS/header.css">
    <link rel="stylesheet" href="../HTML/CSS/footer.css">
    <title>Biztosan törölsz?</title>
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
require_once('authorize.php');
require_once("config.php");
    $id = $_GET['id'];
    $name = $_GET['name'];
    $dbc = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
    $query = "UPDATE songs SET approved = 1 WHERE id='$id'";
    mysqli_query($dbc,$query);
    mysqli_close();
    echo "<h1 style='color:white'>Név: ".$name. " ID: ".  $id. " Zene : Frissítve.";
   
    echo '<h2><a href="admin.php">Vissza az admin oldalra!</a></p>';
?>
</div>