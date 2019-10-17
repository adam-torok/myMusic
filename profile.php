<?php
session_start();
include('processPicture.php');
include('uploadmusic.php');
$host = "localhost";
$dbusername = "root";
$dbpassword = "qwert";
$dbname = "felhasznalo";

//csatlakozás felépítése
$link = @mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
$username = $_POST['username'];
$password = $_POST['password'];
$bio = $_SESSION['bio'];
$profpic = $_SESSION['profpic'];


if(mysqli_connect_error()) die('nem sikerült a db csatlakozás');

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="compact-disc.png">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, content="width=1000" maximum-scale=1, user-scalable=no"/> <!--320-->

        <link rel="stylesheet" href="main.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/75ad4010ea.js" crossorigin="anonymous"></script>
        <title>Welcome <?php echo $_SESSION['username'];?></title>

</head>

<body>
<style>
    body{
        background-color:#e2e1e0;
    }
 h2{
   color:grey;
   font-size:14px;
 }
 h4{
     color:black;
 }
 </style>
        <header class="nav-down" id="header">
                <nav class="fill">
                    <ul>
                        <img class="logo" src="img/.png" alt="">
                        <li><a href="welcome.php">Főoldal</a></li>
                        
                        <input type="text" placeholder="Search..">
                        <li id="sugo"><a href="#contact">Sugó</a></li>
                        <li><a href="profile.php"><img class="image-header" src="profileimages/<?php echo $profpic;?>" alt=""></a></li>
                        <div id="button"><a href="logout.php"><i class="fas fa-sign-in-alt fa-1x"></i></a></div>
                        <div id="change"><a  href="#"><i class="fas fa-adjust fa-1x"></i></a></div>
                    </ul>
                </nav>
            </header>
<div class="container">
  <div id="cardcontainer" class="cardcontainer">
    <h4>Profilod</h4>
    <img class="profileImage" src="profileimages/<?php echo $profpic;?>"  alt="profilkép">
    <h4>ID</h4>
    <h2><?php echo $_SESSION['id'];?></h2>
    <h4>Felhasználónév</h4>
    <h2><?php echo $_SESSION['username']?></h2>
    <h4>BIO</h4>
    <h2><?php echo $_SESSION['bio']?></h2>
    <h4>Regrisztáció dátuma</h4>
    <h2><?php echo $_SESSION['time']?></h2>
<h2>A felhasználó még nem töltött fel tartalmat az oldalra.</p>
<form method="post" action="processPicture.php" enctype="multipart/form-data">
<input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage">
<br>
<br>
<input class="inputFields" type="text" style="width:100%;" name="bio" placeholder="Say something about yourself.">
<br>
<br>
<button type="submit" id="save_profile" name="save_user">Feltöltés!</button>
</form>


  </div>
  <div id="cardcontainer" class="cardcontainer">
    <form method="post" action="uploadmusic.php" enctype="multipart/form-data">
    <h2>No recent activity</p>

<input class="inputFields" type="text" placeholder="Zene neve"  name="nameofmusic"><br><br>
<input class="inputFields" type="text" placeholder="Előadója" " name="artistofmusic"><br><br>
<input class="inputFields" type="text" placeholder="Műfaj" " name="genreofmusic"><br><br>
<p>album cover</p>
<input type="file" name="albumUpload"  id="albumUpload">
<p>music</p>
<input type="file" name="musicUpLoad"  id="musicUpLoad">
<button type="submit" id="save_music" name="save_music">Feltöltés!</button>


    </form>
  </div>
</div>
<div class="footer">
            <ul>
                <li>
                    <h2>Rólunk</h2> </li>
                <li>Rólunk</li>
                <li>Állások</li>
                <li>For The Record</li>
            </ul>
            <ul>
                <li>
                    <h2>Közösségek</h2> </li>
                <li>Előadóknak</li>
                <li>Fejlesztők</li>
                <li>Szállítók</li>
            </ul>

            <ul>
                <li>
                    <h2>Hivatkozások</h2> </li>
                <li>Sugó</li>
                <li>Webes lejátszó</li>
                <li>Történetünk</li>

            </ul>
            <ul class="socials">
                <li><i class="fab fa-github-square fa-3x"></i> </li>
                <li><i class="fab fa-linkedin fa-3x"></i> </li>
                <li><i class="fab fa-facebook-square fa-3x"></i> </li>

            </ul>

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
        $("#change").click(function(){
        $(".cardcontainer").toggleClass("cardcontainerblack");
        $("body").toggleClass("bodyblack");
        });
});
</script>
</body>
</html>