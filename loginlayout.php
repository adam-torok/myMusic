<?php
include_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="main.css">

    <script src="https://kit.fontawesome.com/75ad4010ea.js" crossorigin="anonymous"></script>
    <title>Login into myMusic!</title>
</head>
<body>

<video autoplay muted loop id="myVideo">
  <source src="video2.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>
    <h1>Bejelentkezés</h1>
    
<div class="formholder">

    <div class="form">
    <form class="signupForm" method="POST" action="login.php">

<input class="inputFields" type="text" placeholder="Felhasználónév"  id="username" name="username"><br><br>
<input class="inputFields" type="password" placeholder="Jelszó" id="password" name="password"><br><br>
<input type="submit" id="login" value="Bejelentkezés">

</form>       

    </div>
    
    </div> 

</body>
</html>
