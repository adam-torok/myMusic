<?php
session_start();
include_once(login.php);
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
        <meta name="viewport" content="initial-scale=1.0, width=device-width">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="main.css">
        <script src="https://kit.fontawesome.com/75ad4010ea.js" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, content="width=1000" maximum-scale=1, user-scalable=no"/> <!--320-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Üdvözlünk
            <?php echo $_SESSION['username'];?>
        </title>
    </head>
    <body class="bodyblack">
        <style>
            body {
                background-color:#F2F2F2;
            }
            h2 {
                color: grey;
            }
            h4{
                color: black;

            }
        </style>
        <header class="nav-down" id="header">
            <nav class="fill">
                <ul>
                    <img class="logo" src="img/.png" alt="">
                    <li><a href="welcome.php">Főoldal</a></li>  
                    <input type="text" placeholder="Keresés">
                    <li id="sugo"><a href="#contact"> Sugó</a></li>
                    <li><a href="profile.php"><img class="image-header" src="profileimages/<?php echo $profpic;?>" alt=""></a></li>
                    <div  id="button"><a href="logout.php"><i style="padding:0;" class="fas fa-sign-in-alt fa-1x"></i></a></div>
                    <div  id="change"><a onclick="changeStyle()" href="#"><i  style="padding:0;" class="fas fa-adjust fa-1x"></i></a></div>
                </ul>
            </nav>
        </header>

        <div class="genres" style="margin-top:100px; padding-bottom:50px;">
<button href="#rock"  class="btn" type="button"> Rock </button>
<button href="#pop" class="btn" type="button">Pop</button>
<button class="btn" type="button">Classical</button>
<button  href="#house" class="btn" type="button">House</button>
</div>
<h1>Válogatott zenék, neked!</h1>


<div class="container">


<div  id="alternativ" class="banner">
<h3>Alternatív</h2>
        <h2
        >Popular playlists from the myMusic community</h2>
</div>

        <div class="row">
        <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Alternatív'";
        $result = mysqli_query($link,$sql);

 while($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="row_inner">
        <div class="tile">
        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4><?php echo $row['name']; ?></h4>
                            <h2>Uploaded by <?php echo $row['uploadedby']; ?></h4>
        <div class="tile__media">
          <img class="tile__img" src="img/albumcover/<?php echo $row['covername'];?> ">
          <a href="songs/<?php echo $row['filename']; ?>"></a>
          <i id="playbutton" class="fas fa-play playbutton"></i>     
        </div>
   
     
   
      </div>
        </div>
        <?php 
      }//while end ?>
     </div>



     <div id="Tropical" class="banner">
<h3>Tropical</h3>
        <h2>Popular playlists from the myMusic community</h2>
</div>
        <div class="row">
        <?php $sql = "SELECT * FROM songs  WHERE `genre` = 'Tropical'";
        $result = mysqli_query($link,$sql);

 while($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="row_inner">
        <div class="tile">
        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4><?php echo $row['name']; ?></h4>
                            <h2>Uploaded by <?php echo $row['uploadedby']; ?></h4>
        <div class="tile__media">
          <img class="tile__img"  onclick="play()" src="img/albumcover/<?php echo $row['covername'];?> ">
          <a href="songs/<?php echo $row['filename']; ?>"></a>
          <i id="playbutton" class="fas fa-play playbutton"></i>     

        </div>
   
     
   
      </div>
        </div>
        <?php 
      }//while end ?>
     </div>
   

     

     <div id="classical" class="banner">
<h3>Rap</h3>
        <h2>Popular playlists from the myMusic community</h2>
</div>
        <div class="row">
        <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Rap'";
        $result = mysqli_query($link,$sql);

 while($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="row_inner">
        <div class="tile">
        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4><?php echo $row['name']; ?></h4>
        <h2>Uploaded by <?php echo $row['uploadedby']; ?></h4>
        <div class="tile__media">
          <img class="tile__img"  onclick="play()" src="img/albumcover/<?php echo $row['covername'];?> ">
          <a href="songs/<?php echo $row['filename']; ?>"></a>
          <i id="playbutton" class="fas fa-play playbutton"></i>     

        </div>
   
     
   
      </div>
        </div>
        <?php 
      }//while end ?>
     </div>
   



     <div id="classical" class="banner">
<h3>Classical</h2>
        <h2>Popular playlists from the myMusic community</h2>
</div>
        <div class="row">
        <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Classical' ORDER BY time DESC";
        $result = mysqli_query($link,$sql);

 while($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="row_inner">
        <div class="tile">
        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4><?php echo $row['name']; ?></h4>
                            <h2>Uploaded by <?php echo $row['uploadedby']; ?></h4>
        <div class="tile__media">
          <img class="tile__img"  onclick="play()" src="img/albumcover/<?php echo $row['covername'];?> ">
        <a href="songs/<?php echo $row['filename']; ?>"></a>
        <i id="playbutton" class="fas fa-play playbutton"></i>     
        </div>
   
   
   
      </div>
        </div>
        <?php 
      }//while end ?>
     </div>
   

     <div id="pop" class="banner">
<h3>Pop</h2>
        <h2>Popular playlists from the myMusic community</h2>
</div>
        <div class="row">
        <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Pop'";
        $result = mysqli_query($link,$sql);

 while($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="row_inner">
        <div class="tile">
       

        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4><?php echo $row['name']; ?></h4>
                            <h2>Uploaded by <?php echo $row['uploadedby']; ?></h4>
        <div class="tile__media">
          <img class="tile__img" src="img/albumcover/<?php echo $row['covername'];?> ">
          <a href="songs/<?php echo $row['filename']; ?>"></a>
          <i id="playbutton" class="fas fa-play playbutton"></i>     
        </div>
      </div>
        </div>
        <?php 
      }//while end ?>
     </div>




     <div id="future" class="banner">
<h3>Future House</h2>
        <h2>Popular playlists from the myMusic community</h2>
</div>
        <div class="row">
        <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Future'";
        $result = mysqli_query($link,$sql);

 while($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="row_inner">
        <div class="tile">
       

        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4><?php echo $row['name']; ?></h4>
                            <h2>Uploaded by <?php echo $row['uploadedby']; ?></h4>
        <div class="tile__media">
          <img class="tile__img" src="img/albumcover/<?php echo $row['covername'];?> ">
          <a href="songs/<?php echo $row['filename']; ?>"></a>
          <i id="playbutton" class="fas fa-play playbutton"></i>     
        </div>
      </div>
        </div>
        <?php 
      }//while end ?>
     </div>

     </div>
<div class="player">
<div class="tile__media">
          <img id="playerImage" class="tile__img" src="img/albumcover/albumcoverbase.png">
          <a href="songs/"></a>
        </div>
<div class="name">
<h2 class="nameButton">Artist</h2>
<h2 id="artistName"></h2>
<h4 id="songName">Listen to a song!</h4>
<div id="buttons">
<i id="playButton" class="fas fa-play"></i>
<i id="pauseButton" class="fas fa-pause"></i>
<i class="fas fa-forward"></i>
</div>
</div>
<audio id="myaudio" style="width:50%" id="player" autoplay >
         <source  src="songs/" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>  
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

        // Zene szüneteletése gommbal
        $("#pauseButton").click(function(){
          $("#myaudio").trigger('pause');
        });

        // Zene lejátszás gombbal
        $("#playButton").click(function(){
          $("#myaudio").trigger('play');
        });


        // NIGHT MODE-RA VÁLTÁS
        $("#change").click(function(){
        $(".profile").toggleClass("profileblack");
        $("body").toggleClass("bodyblack");
        });
        // POPUP BEZÁRÁSA.
        $("#close-button").click(function(){
            $(".popup").css("display","none");
        });

       
        $(".nameButton").click(function(){
            var artistName = $(this).text();
            window.location.replace('searched.php?artistname=' + artistName);
            console.log(artistName);

        });
     
       
        $(document).on('click','#playbutton',function(){
        var src = $(this).parent().find('a').attr('href');  
        var imgsrc = $(this).parent().find('img').attr('src');
        var playerImage = $("#playerImage").attr('src',imgsrc);

        x = $(this).parent().parent().find('h2').first().text();
        y = $(this).parent().parent().find('h4').first().text();

        console.log(x);
        console.log(y);
        $("#songName").text(y);

        $("#artistName").text(x);

        var k = $("#myaudio").attr("src", src);
          if(x.length === 0 ){
            console.log("Dude it is empty");
          }
      
        // Keresd meg a source-t
        // tedd bele a linket   
        
  })
});
</script>
        <script>
        function changeStyle() {
                var element = document.getElementById("mycontainer");
                element.classList.toggle("wrapperblack");
            }
        </script>
    </body>
    </html>



    <?php
    // TRYING TO QUERY 
if (isset($_GET['rock'])) {
    myFunction();
  }
function myFunction() {
}
?>
    