<?php
session_start();
require_once('config.php');
//csatlakozás felépítése
$link = @mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
$username = $_POST['username'];
$password = $_POST['password'];
$bio = $_SESSION['bio'];
$profpic = $_SESSION['profpic'];
$uname = $_SESSION['username'];
  

if(mysqli_connect_error()) die('nem sikerült a db csatlakozás');

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../img/compact-disc.png">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, content="width=1000" maximum-scale=1, user-scalable=no"/> <!--320-->

        <link rel="stylesheet" href="../HTML/CSS/main.css">
        <link rel="stylesheet" href="../HTML/CSS/header.css">
        <link rel="stylesheet" href="../HTML/CSS/fonts.css">
        <link rel="stylesheet" href="../HTML/CSS/footer.css">
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

 h2{
   color:grey;
   font-size:14px;
 }
 h4{
     color:black;
 }
 p{
     text-align:left;
 }
 .container{
    display: grid;
    grid-template-columns:1fr;
 }
.upload{
    margin-left:1rem;
    width:70%;
    justify-content:center;
    justify-self:center;
}
 </style>
        <header class="nav-down" id="header">
                <nav class="fill">
                    <ul>
                        <img class="logo" src="img/.png" alt="">
                        <li><a href="welcome.php">Főoldal</a></li>
                        <input type="text" placeholder="Search..">
                        <li id="sugo"><a href="#contact">Sugó</a></li>
                        <li><a href="profile.php"><img class="image-header" src="../profileimages/<?php echo $profpic;?>" alt=""></a></li>
                        <div id="button"><a href="../PHP/logout.php"><i style="padding:0;" class="fas fa-sign-in-alt fa-1x"></i></a></div>
                        <div id="change"><a  href="#"><i style="padding:0;color:grey;" class="fas fa-adjust fa-1x"></i></a></div>
                    </ul>
                </nav>
            </header>

<div class="user-header">
<div class="user-infos">
     <div class="user-info">
     <div class="profile-image">
         <img src="../profileimages/<?php echo $profpic;?>"  alt="profilkép">
     </div>
     <div class="user-details">
        <div class="user-info-type"><h2>Felhasználó</h2></div>
        <div class="user-info-name"><h2><?php echo $_SESSION['username']?></h2></div>
        <div class="user-info-date"><h2><?php echo $_SESSION['time']?></h2></div>
     </div>
</div>
</div>
</div>  
<div class="container">
<div class="upload">
<h1 style="color:white">Feltöltés</h1>
<form method="post" action="uploadmusic.php" enctype="multipart/form-data">
    <h2 id="nameErrorMessage">  * Maximum 20 karakter.</h2>
<input class="inputFields uploadmusic" onkeydown="checkMusicName()" id="musicName" type="text" placeholder="Zene neve"  name="nameofmusic" required><br><br>
    <h2 id="artistErrorMessage">  * Maximum 20 karakter.</h2>
<input class="inputFields uploadmusic" onkeydown="checkArtistName()" id="artistName" type="text" placeholder="Előadója"  name="artistofmusic" required><br><br>
<!--<input class="inputFields uploadmusic" type="text" placeholder="Műfaj"  name="genreofmusic" required><br><br>-->

<select name="genreofmusic">
  <option value="Rap">Rap</option>
  <option value="Classical">Classical</option>
  <option value="Future">Future House</option>
  <option value="Tropical">Tropical</option>
  <option value="Pop">Pop</option>
  <option value="Alternatív">Alternatív</option>
</select>
<p>Album fotó</p>
<input class="uploadmusic" type="file" name="albumUpload"  id="albumUpload" required>
<p>Zene file</p>
<input class="uploadmusic" type="file" name="musicUpLoad"  id="musicUpLoad" required>
<br>
<button type="submit" class="btn" id="save_music" name="save_music">Feltöltés!</button>

    </form>
  </div>
<div class="track-container">
        <?php $sql = "SELECT * FROM songs WHERE `uploadedby` = '$uname'";
        $result = mysqli_query($link,$sql);
 while($row = mysqli_fetch_assoc($result)) {?>
        <div class="track">
        <div class="thing">
        <i id="addPlayListButton" class="fas fa-check  fa-1x"></i>
        </div>
        <div class="track-number">
        <h2><?php echo $row['artist'];?></h2>
        </div>
         <div class="track-number">
        <h2><?php echo $row['id'];?></h2>
        </div>
       
        <div class="track-added">
        <h2><?php echo $row['time'];?></h2>
        </div>
        <div class="track-audio">
        <a href="../songs/<?php echo $row['filename']; ?>"></a>
        <a id="albumcover" href="../img/albumcover/<?php echo $row['covername']; ?>"></a>
        </div>
        <div class="track-title">
        <h2><?php echo $row['name'];?></h2>
        </div>
        </div>
        <?php 
      }//while end ?>

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
         function checkMusicName(){
             let inputForUsername = document.getElementById("musicName").value;
             if(inputForUsername.length == null || inputForUsername.length < 20 ){
                 var errormsg = document.getElementById("nameErrorMessage").style.display = "none";
             }
             else var errormsg = document.getElementById("nameErrorMessage").style.display = "block";            
         }
         function checkArtistName(){
             let inputForUsername = document.getElementById("artistName").value;
             if(inputForUsername.length == null || inputForUsername.length < 20 ){
                 var errormsg = document.getElementById("artistErrorMessage").style.display = "none";
             }
             else var errormsg = document.getElementById("artistErrorMessage").style.display = "block";            
         }
      </script>
</body>
</html>