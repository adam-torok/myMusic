<?php
session_start();
error_reporting(0);
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
require_once('CONFIG/config.php');
// Megnézem, hogy bevan e jelentkezve az illető
if(!isset($_SESSION['logged'])){
    header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
}
$id = $_SESSION['id'];
$uname = $_SESSION['username'];
$password = $_POST['password'];
$sql = "SELECT profile_image FROM felhasznalo WHERE id = '$id'";
$result = mysqli_query($dbc,$sql);
while($row = $result->fetch_assoc()) {
       $_SESSION['profpic'] = $row["profile_image"];
    }
$bio = $_SESSION['bio'];
$profpic = $_SESSION['profpic'];
$uname = $_SESSION['username'];
$sql = "SELECT COUNT(*) FROM songs where uploadedby like '$uname'";

$res = mysqli_query($dbc,$sql);
while($row = $res->fetch_assoc()) {
      $_SESSION['$numOfUploads'] = $row['COUNT(*)'];
};
$numOfUploads = $_SESSION['$numOfUploads'];
if(mysqli_connect_error()) die('nem sikerült a db csatlakozás');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("COMPONENTS/headerMeta.php"); ?>
    <title>Welcome <?php echo $_SESSION['username'];?></title>
</head>
<?php

?>
<body>
<style>
body{
  background:var(--bg-color);
}
p{
   text-align:left;
}
.form{
 background-color:#424242;
}
.form input{
 background-color:#424242;
 color:white;
}
.form input::placeholder{
 color:white;
}
.container{
  display: grid;
  grid-template-columns:1fr 1fr;
  background:var(--bg-color);
}
.form-center{
 height: auto;
 background-color: unset;
 background-image: none;
}
 </style>
 <header class="nav-dark" id="header">
   <nav class="fill">
     <ul>
                        <img style="width:50px;height:50px;" src="../IMG/myMusicLogo.png" alt="">
                         <li><a href="welcome.php">Főoldal</a></li>
                         <form action="searchedSong.php" method="POST">
                         <input name="searchedSong" class="inputFields" type="text" placeholder="Keresés">
                          </form>
                         <li id="sugo"><a href="https://github.com/woltery99/myMusic/wiki">Sugó</a></li>
                         <li><a href="profile.php"><img class="image-header" src="../profileimages/<?php echo $profpic;?>" alt=""></a></li>
                         <div id="button"><a href="../PHP/logout.php"><i style="padding:0;" class="fas fa-sign-in-alt fa-1x"></i></a></div>
                         <div id="change"><a  href="#"><i style="padding:0;color:grey;" class="fas fa-adjust fa-1x"></i></a></div>
      </ul>
    </nav>
</header>
<div style="background: linear-gradient( rgb(19, 13, 10), rgba(0, 0, 0, 0.7), rgba(32, 32, 32,1)), url(../profileimages/<?php echo $profpic?>)!important;" class="user-header">
<div class="user-infos">
     <div class="user-info">
     <div class="profile-image">
         <img src="../PROFILEIMAGES/<?php echo $_SESSION['profpic'];?>"  alt="profilkép">
     </div>
     <div class="user-details">
       <img style="width:50px;height:50px;" src="../IMG/myMusicLogo.png" alt="">
        <div class="user-info-type"><h2>Felhasználó</h2></div>
        <div class="user-info-name"><h2><?php echo $_SESSION['username'];?></h2></div>
        <div class="user-info-date"><h2>Feltöltött számok: <span id="upload-counter"><?php echo $numOfUploads;?></span></h2>
        <h2 id="user-title"></h2></div>
        <form enctype="multipart/form-data" action="#" method="POST">
          <label for="file-upload" class="material-icon">
            <i style="color:white" class="fas fa-upload"></i>
          </label>
            <input class="hidden-file-input" id="file-upload" accept="image/x-png,image/gif,image/jpeg" type="file" name="profile_image" id="profile_image">
            <label for="file-save" class="material-icon">
            <i style="color:white" class="fas fa-save"></i>
            </label>
            <input class="hidden-file-input" id="file-save" type="submit" name="save_user">

        </form>
        <?php
        if(isset($_POST['save_user'])){
        $profileImageName = $_FILES['profile_image']['name'];
        $profileImageName = strtolower($profileImageName);
        $profileImageName = trim($profileImageName);
        $target = 'C:\wamp64\www\mymusic\PROFILEIMAGES/' . $profileImageName;
        if(move_uploaded_file($_FILES['profile_image']['tmp_name'],$target)){
            $sql = "UPDATE felhasznalo SET profile_image = '$profileImageName' WHERE id='$id'";
            if(mysqli_query($dbc,$sql)){
              echo "<div id='popup' class='pop-up'>
                  <h3>Sikeres frissítés!</h3>
                  <p>Sikeresen frissítetted a profilképedet! </p>
                  <a href='profile.php' onclick='closePopUp()' id='disable' class='material-button'>Rendben</a>
                </div>";
            }
            else{
                echo "<script> alert('Sikertelen)</script>.";
            }
        }else{
            echo "<script> alert('Sikertelen feltöltés.')</script>";
        }
        }
        ?>
     </div>
</div>
</div>
</div>
<h1 style="color:white">Nemrég feltöltött zenék</h1>
<div class="profile-track-container-featured">
        <?php $sql = "SELECT * FROM songs WHERE `uploadedby` = '$uname' AND approved = 1 ORDER BY id DESC LIMIT 4 ";
        $result = mysqli_query($dbc,$sql);
 while($row = mysqli_fetch_assoc($result)) {?>
   <div>
     <img id="albumcover" class="track-container-picture" src="../PROFILEIMAGES/<?php echo $row['covername'];?>"></a>
     <h2 style="text-align:center"><?php echo $row['artist'];?></h2>
     <h2 style="text-align:center"><?php echo $row['time'];?></h2>

   </div>

        <?php
      }//while end ?>
</div>

<div class="container">
<div class="form-center">
  <div class="form-holder">
  <form class="form" method="post" action="#" enctype="multipart/form-data">
    <img style="width:100px;height:100px;" src="../IMG/myMusicLogo.png" alt="">

    <h1 style="color:#fff">FELTÖLTÉS</h1>

      <div class="input">
        <h2 id="nameErrorMessage">  * Maximum 20 karakter.</h2>
          <input class="inputFields"  onkeydown="checkMusicName()" id="musicName" type="text" placeholder="Zene neve"  name="nameofmusic" required>
          <div class="bar"></div>
      </div>

      <div class="input">
        <h2 id="artistErrorMessage">  * Maximum 20 karakter.</h2>
          <input  class="inputFields" onkeydown="checkArtistName()" id="artistName" type="text" placeholder="Előadója"  name="artistofmusic" required>
          <div class="bar"></div>
      </div>
      <br>
  <p style="text-align:center">Műfaj</p>
  <select name="genreofmusic">
    <option value="Rap">Rap</option>
    <option value="Classical">Classical</option>
    <option value="Future">Future House</option>
    <option value="Tropical">Tropical</option>
    <option value="Pop">Pop</option>
    <option value="Alternatív">Alternatív</option>
  </select>
  <p style="text-align:center">Album fotó</p>
  <input class="material-button" accept="image/*" class="" type="file" name="albumUpload"  id="albumUpload" required>
  <input type="text" id="fileuploadurl" readonly="" placeholder="Csak képfálj a megengedett!">
  <p style="text-align:center">Zene file</p>
  <input class="material-button hidden-button" accept="audio/*" class="" type="file" name="musicUpLoad" id="musicUpLoad" required>
  <input type="text" id="fileuploadurl" readonly="" placeholder="Csak zenefálj a megengedett!">
  <br>
  <button class="material-button" type="submit" class="btn" id="save_music" name="save_music">Feltöltés!</button>
  </form>
  <?php
  if(isset($_POST['save_music'])){
      require_once("COMPONENTS/uploadmusic.php");
  }
?>
  </div>
</div>


<div class="profile-track-container">
    <h1 style="color:white;">Feltöltött számok</h1>
        <?php $sql = "SELECT DISTINCT * FROM songs WHERE `uploadedby` = '$uname' AND approved = 1";
        $result = mysqli_query($dbc,$sql);
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
<a style="background-color:black" id="github" href="#"><img style="width:50px;height:50px;" src="../IMG/myMusicLogo.png" alt="">
</a><?php
include_once("COMPONENTS/footer.php");
?>
<script src="../JS/script.js" charset="utf-8"></script>
<script>
function refreshPage(){
    window.location.reload();
  }
function closePopUp(){
      var x = document.getElementById("popup");
   if (x.style.display === "none") {
     x.style.display = "block";
   } else {
     x.style.display = "none";
   }
    }
function checkMusicName() {
		let inputForUsername = document.getElementById("musicName").value;
		if (inputForUsername.length == null || inputForUsername.length < 20) {
			var errormsg = document.getElementById("nameErrorMessage").style.display = "none";
		} else var errormsg = document.getElementById("nameErrorMessage").style.display = "block";
	}
function checkArtistName() {
	let inputForUsername = document.getElementById("artistName").value;
	if (inputForUsername.length == null || inputForUsername.length < 20) {
	var errormsg = document.getElementById("artistErrorMessage").style.display = "none";
	}
   else var errormsg = document.getElementById("artistErrorMessage").style.display = "block";
 }
</script>
</body>
</html>
