<?php
session_start();
include_once(login.php);
$host = "localhost";
$dbusername = "root";
$dbpassword = "qwert";
$dbname = "felhasznalo";
//Csatlakozás felépítése
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
    <link rel="icon" type="image/png" href="../img/compact-disc.png">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../HTML/CSS/main.css">
        <link rel="stylesheet" href="../HTML/CSS/header.css">
        <link rel="stylesheet" href="../HTML/CSS/footer.css">
        <link rel="stylesheet" href="../HTML/CSS/fonts.css">
        <script src="https://kit.fontawesome.com/75ad4010ea.js" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

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
            i:hover{
              cursor:pointer;
            }
        </style>
        <header class="nav-down" id="header">
            <nav class="fill">
                <ul>
                    <img class="logo" src="img/.png" alt="">
                    <li><a href="welcome.php">Főoldal</a></li>  
                    <input class="inputFields" type="text" placeholder="Keresés">
                    <li id="sugo"><a href="#contact"> Sugó</a></li>
                    <li><a href="profile.php"><img class="image-header" src="../profileimages/<?php echo $profpic;?>" alt=""></a></li>
                    <div  id="button"><a href="logout.php"><i  style="padding:0;" class="fas fa-sign-in-alt fa-1x"></i></a></div>
                    <div  id="change"><a onclick="changeStyle()"><i  style="padding:0;" class="fas fa-adjust fa-1x"></i></a></div>
                </ul>
            </nav>
        </header>
<div class="genres" style="margin-top:100px; padding-bottom:50px;">
  <a href="#Alternativ"><button   class="btn" type="button">Alternatív</button></a>
  <a href="#Tropical"><button   class="btn" type="button">Tropical</button></a>
  <a href="#Rap"><button   class="btn" type="button">Rap</button></a>
  <a href="#Classical"><button   class="btn" type="button">Classical</button></a>
  <a href="#Pop"><button   class="btn" type="button">Pop</button></a>
  <a href="#Future"><button   class="btn" type="button">Future</button></a>

</div>
  <h1>Válogatott zenék, neked!</h1>
<div class="container">
  <div  id="Alternativ" class="banner">
    <h3>Alternatív</h2>
      <h2>Popular playlists from the myMusic community</h2>
  </div>
      <div class="row">
        <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Alternatív'";
        $result = mysqli_query($link,$sql);
        while($row = mysqli_fetch_assoc($result)){
   //A lekérdezésnek megfelelően egy row változóba teszem a resultot
        ?>
          <div class="row_inner">
            <div class="tile">
              <h2 class="nameButton"><?php echo $row['artist'];?></h2>
              <h4><?php echo $row['name']; ?></h4>
              <h2>Uploaded by <?php echo $row['uploadedby']; ?></h4>
            <div class="tile__media">
              <img class="tile__img" src="../img/albumcover/<?php echo $row['covername'];?> ">
              <a href="../songs/<?php echo $row['filename']; ?>"></a>
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
      //A lekérdezésnek megfelelően egy row változóba teszem a resultot
    ?>
        <div class="row_inner">
        <div class="tile">
        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4><?php echo $row['name']; ?></h4>
        <h2>Uploaded by <?php echo $row['uploadedby']; ?></h4>
        <div class="tile__media">
          <img class="tile__img"  onclick="play()" src=../img/albumcover/<?php echo $row['covername'];?> ">
          <a href="../songs/<?php echo $row['filename']; ?>"></a>
          <i id="playbutton" class="fas fa-play playbutton"></i>     

        </div>   
      </div>
        </div>
        <?php 
      }//while end ?>
     </div>
     <div id="Rap" class="banner">
        <h3>Rap</h3>
        <h2>Popular playlists from the myMusic community</h2>
    </div>
        <div class="row">
        <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Rap'";
        $result = mysqli_query($link,$sql);
        while($row = mysqli_fetch_assoc($result)) {
      //A lekérdezésnek megfelelően egy row változóba teszem a resultot
    ?>
        <div class="row_inner">
        <div class="tile">
        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4><?php echo $row['name']; ?></h4>
        <h2>Uploaded by <?php echo $row['uploadedby']; ?></h4>
        <div class="tile__media">
          <img class="tile__img"  onclick="play()" src=../img/albumcover/<?php echo $row['covername'];?> ">
          <a href="../songs/<?php echo $row['filename']; ?>"></a>
          <i id="playbutton" class="fas fa-play playbutton"></i>     
        </div>
      </div>
        </div>
        <?php 
      }//while end ?>
     </div>
     <div id="Classical" class="banner">
        <h3>Classical</h2>
        <h2>Popular playlists from the myMusic community</h2>
</div>
        <div class="row">
        <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Classical' ORDER BY time DESC";
        $result = mysqli_query($link,$sql);

 while($row = mysqli_fetch_assoc($result)) {
      //A lekérdezésnek megfelelően egy row változóba teszem a resultot
    ?>
        <div class="row_inner">
        <div class="tile">
        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4><?php echo $row['name']; ?></h4>
        <h2>Uploaded by <?php echo $row['uploadedby']; ?></h4>
        <div class="tile__media">
          <img class="tile__img"  onclick="play()" src=../img/albumcover/<?php echo $row['covername'];?> ">
        <a href="../songs/<?php echo $row['filename']; ?>"></a>
        <i id="playbutton" class="fas fa-play playbutton"></i>     
        </div>
        </div>
        </div>
        <?php 
      }//while end ?>
     </div>
     <div id="Pop" class="banner">
        <h3>Pop</h2>
        <h2>Popular playlists from the myMusic community</h2>
      </div>
        <div class="row">
        <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Pop'";
        $result = mysqli_query($link,$sql);
        while($row = mysqli_fetch_assoc($result)) {
      //A lekérdezésnek megfelelően egy row változóba teszem a resultot
        ?>
        <div class="row_inner">
        <div class="tile">
        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4><?php echo $row['name']; ?></h4>
        <h2>Uploaded by <?php echo $row['uploadedby']; ?></h4>
        <div class="tile__media">
          <img class="tile__img" src=../img/albumcover/<?php echo $row['covername'];?> ">
          <a href="../songs/<?php echo $row['filename']; ?>"></a>
          <i id="playbutton" class="fas fa-play playbutton"></i>     
        </div>
      </div>
        </div>
        <?php 
      }//while end ?>
     </div>
     <div id="Future" class="banner">
    <h3>Future House</h2>
    <h2>Popular playlists from the myMusic community</h2>
    </div>
        <div class="row">
        <?php $sql = "SELECT * FROM songs WHERE `genre` = 'Future'";
        $result = mysqli_query($link,$sql);

 while($row = mysqli_fetch_assoc($result)) {
      //A lekérdezésnek megfelelően egy row változóba teszem a resultot
    ?>
        <div class="row_inner">
        <div class="tile">
        <h2 class="nameButton"><?php echo $row['artist'];?></h2>
        <h4><?php echo $row['name']; ?></h4>
                            <h2>Uploaded by <?php echo $row['uploadedby']; ?></h4>
        <div class="tile__media">
          <img class="tile__img" src=../img/albumcover/<?php echo $row['covername'];?> ">
          <a href="../songs/<?php echo $row['filename']; ?>"></a>
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
        <img id="playerImage" class="tile__img" src="../img/albumcover/albumcoverbase.png">
        <a href="songs/"></a>
    </div>
    <div class="name">
        <h2 class="nameButton">Artist</h2>
        <h2 id="artistName"></h2>
        <h4 id="songName">Listen to a song!</h4>
        <div id="buttons">
            <i id="playButton" class="fas fa-play"></i>
            <i id="pauseButton" class="fas fa-pause"></i> 
        </div>
    
    </div>
    <h2 style="padding-right:1rem; font-size:13px; color:#EE5135" id="current-time"></h2>
    <canvas id="progress" width="500" height="5"></canvas>
    <h2  style=" padding-left:1rem;" id="duration"></h2>
    <audio ontimeupdate="updateBar()" id="myaudio"  id="player" autoplay>
        <source src="../songs/" type="audio/mpeg"> Your browser does not support the audio element.
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
      var canwasWidth = 500;
       var audioEl = document.getElementById("myaudio");
       var canvas = document.getElementById("progress").getContext('2d');
       function updateBar(){
        audioEl.addEventListener('loadedmetadata',function(){
         var duration = audioEl.duration;
         var currentTime = audioEl.currentTime;
         document.getElementById("duration").innerHTML = convertElapsedTime(duration);
         document.getElementById("current-time").innerHTML = convertElapsedTime(currentTime);
         canvas.fillRect(0,0,canwasWidth,50);      
       });
        function convertElapsedTime(inputSeconds){
          var seconds = Math.floor(inputSeconds % 60);
          if(seconds < 10){
            seconds = "0"+seconds;
          }
          var minutes = Math.floor(inputSeconds / 60);
          return minutes + ":" + seconds;
        };
            console.log("im heree");
          canvas.clearRect(0,0,canwasWidth,50);
          canvas.fillStyle = "#000";
          canvas.fillRect(0,0,canwasWidth,50);  

          var currentTime = audioEl.currentTime;
          var duration = audioEl.duration;

          document.getElementById("current-time").innerHTML = convertElapsedTime(currentTime);

          var percentage = currentTime / duration;
          var progress = (canwasWidth * percentage);
          canvas.fillStyle = "#FF0000";
          canvas.fillRect(0,0,progress,50);
        };
     
      $(document).ready(function(){
       
        // Zene szüneteletése gommbal
      $("#pauseButton").click(function(){
        $("#myaudio").trigger('pause');
      });
        // Zene lejátszása gombbal
      $("#playButton").click(function(){
        $("#myaudio").trigger('play');
      });
        // Sötét témára állítás
      $("#change").click(function(){
        $(".profile").toggleClass("profileblack");
        $("body").toggleClass("bodyblack");
      });
        // POPUP BEZÁRÁSA.
      $("#close-button").click(function(){
        $(".popup").css("display","none");
      });
       //Kattintásra, az URL sávba beszúrja az adott előadó nevét, és ezt kéri el a PHP 
      $(".nameButton").click(function(){
        var artistName = $(this).text();
        window.location.replace('searched.php?artistname=' + artistName);
        console.log(artistName);
      });
        //Ha rákattintunk a playbuttonra, jelenjen meg a audió sávban
      $(document).on('click','#playbutton',function(){
        // Megkeresi a parent div elementjének az a tagjét, és a href változóját egy src változóba teszi
        var src = $(this).parent().find('a').attr('href');  
        // Megkersi a parent div elementjének az img tagjét, és a source attributumát egy imgsrc változóba teszi
        var imgsrc = $(this).parent().find('img').attr('src');
        // A lejátszóba a playerImage id-s képnek új src attribútumot állít be, az imgsrc-ban lévő értéket.
        var playerImage = $("#playerImage").attr('src',imgsrc);
          // Megkeresi a nagyszülő h2, h4 tagjeit, és elmentem változóba
        x = $(this).parent().parent().find('h2').first().text();
        songName = $(this).parent().parent().find('h4').first().text();
        $("#songName").text(songName);
        $("title").text("Now playing: " + songName);
        $("#artistName").text(x);
          //A myaudio id-jú audio tagbe kicseréli a src-t, arra a src-ra ami a volt a tag-nek volt a href-je
        var k = $("#myaudio").attr("src", src);
        /* if(x.length === 0 ){
            console.log("Üres az src!");
          }
        */
  })
});
</script>
    </body>
    </html>
    <?php
?>
    