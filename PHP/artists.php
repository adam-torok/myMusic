<?php
session_start();
include_once(login.php);
require_once('config.php');
//csatlakozás felépítése
$link = @mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
$username = $_POST['username'];
$password = $_POST['password'];
$bio = $_SESSION['bio'];
$profpic = $_SESSION['profpic'];
$artistName = $_GET["artistname"]; 

if(mysqli_connect_error()) die('nem sikerült a db csatlakozás');
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <link rel="icon" type="image/png" href="../img/compact-disc.png">
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
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
            .divider{
                grid-template-columns:15% 85%;
            }
          
        </style>
        <header class="nav-down" id="header">
            <nav class="fill">
                <ul>
                    <img class="logo" src="img/.png" alt="">
                    <li><a href="welcome.php">Főoldal</a></li>  
                    <input type="text" placeholder="Keresés">
                    <li id="sugo"><a href="#contact"> Sugó</a></li>
                    <li><a href="profile.php"><img class="image-header" src="../profileimages/<?php echo $profpic;?>" alt=""></a></li>
                    <div id="button"><a href="logout.php"><i style="padding:0;" class="fas fa-sign-in-alt fa-1x"></i></a></div>
                    <div id="change"><a onclick="changeStyle()" href="#"><i style="padding:0;" class="fas fa-adjust fa-1x"></i></a></div>
                </ul>
            </nav>
        </header>

        <div class="divider">

        <div style="margin-top:50px"  class="sidebar">
  <div class="sidebar-items">
    <a href="#" class="sidebar-item">
    <i id="addPlayListButton" class="fas fa-plus-circle  fa-1x"></i>
    <span><h2>Böngészés</h2></span>
    </a>
    <a href="#" class="sidebar-item">
    <i id="addPlayListButton" class="fas fa-user  fa-1x"></i>
    <span><h2>Aktivitás</h2></span>
    </a>
    <a href="#" class="sidebar-item">
    <i id="addPlayListButton" class="fas fa-music  fa-1x"></i>
    <span><h2>Zenék</h2></span>
    </a>
    <a href="artists.php" class="sidebar-item">
    <i id="addPlayListButton" class="fas fa-users  fa-1x"></i>
    <span><h2>Zenészek</h2></span>
    </a>
  </div>
  <form  class="hide playlistForm"  action="createPlayList.php" method="post">
    <input style="width:50%!important;" class="uploadmusic" type="text" name="userPlaylistName" placeholder="Playlist name">
  </form>
  </div>

<div class="track-container">
<div class="searched-header">
<h2>Az összes jelenlegi</h2>
<h1>ZENÉSZEK</h1>
</div>
        <?php $sql = "SELECT artist, genre FROM songs";
        $result = mysqli_query($link,$sql);
 while($row = mysqli_fetch_assoc($result)) {?>
        <div class="track">
        <div class="thing">
        <i id="addPlayListButton" class="fas fa-plus-circle  fa-1x"></i>
        </div>
        <div class="track-number">
        <a href="welcome.php"><h2><?php echo $row['artist'];?></h2></a>
        </div>
         <div class="track-added">
        <h2><?php echo "műfaj: ".$row['genre'];?></h2>
        </div>
        </div>
        <?php 
      }//while end ?>
   
     </div>
 <div style="display:none" class="player">
<audio id="myaudio" style="display:none" id="player" autoplay="off" controls>
         <source  src="songs/" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>  
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
        // NIGHT MODE-RA VÁLTÁS
        $("#change").click(function(){
        $(".profile").toggleClass("profileblack");
        $("body").toggleClass("bodyblack");
        });
        // POPUP BEZÁRÁSA.
        $("#close-button").click(function(){
            $(".popup").css("display","none");
        });
     
     // EZ KÉNE A SOURCE-NAK LENNIEEEE!
        $(document).on('click','#playbutton',function(){
        var src = $(this).parent().find('a').attr('href');     
        var albumsource = $('#albumcover').attr('href');   
        // keresse meg az albumcover rejtett a tagnek a h tagjét és mentse el változóba 
        console.log(albumsource);
        // A source link felépítése, és css-be beszúrása.
        albumsource = "url(" + albumsource + ")";
            var headerChange = $(".searched-header").css("background","linear-gradient(rgba(17, 17, 17, 0.9), rgba(18, 18, 18,1)),"+albumsource);
        // Keresd meg a source-t
        // tedd bele a linket   
       var k = $("#myaudio").attr("src", src);
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

    