<?php
require_once('CONFIG/config.php');
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
//Csatlakozás felépítése
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
   <?php include_once("..\PHP\COMPONENTS\headerMeta.php"); ?>
    <title>Üdvözlünk látogató!</title>
    </head>
    <style media="screen">
      .material-button{
      margin: 1rem;
      }
    </style>
    <body class="bodyblack">
        <header class="nav-down" id="header">
            <nav class="fill">
                <ul>
                  <img style="width:50px;height:50px;" src="../IMG/myMusicLogo.png" alt="">
                    <li><a href="../HTML/index.html">Főoldal</a></li>
                    <input class="inputFields" type="text" placeholder="Keresés">
                    <div id="button"><a href="../HTML/loginlayout.html"><i style="padding: 0" class="fas fa-sign-in-alt fa-1x"></i></a></div>
                    <li id="sugo"><a href="#contact"> Sugó</a></li>
                </ul>
            </nav>
        </header>
        <div class="genres" style="margin-top:100px; padding-bottom:50px;">
        <a href="#Alternativ"><button   class="material-button" type="button">Alternatív</button></a>
        <a href="#Tropical"><button   class="material-button" type="button">Tropical</button></a>
        <a href="#Rap"><button   class="material-button" type="button">Rap</button></a>
        <a href="#Classical"><button   class="material-button" type="button">Classical</button></a>
        <a href="#Pop"><button   class="material-button" type="button">Pop</button></a>
        <a href="#Future"><button   class="material-button" type="button">Future</button></a>
        </div>
  <h1>Válogatott zenék, neked!</h1>
  <!-- ZENE LEKÉRDEZÉSEK -->
    <?php include_once("COMPONENTS/displayMusic.php");?>
  <!-- SAJÁT, NEM HTML5 PLAYER -->
    <div class="player">
    <div class="tile-media">
        <img id="playerImage" class="tile-img" src="../img/albumcover/albumcoverbase.png">
        <a href="songs/"></a>
    </div>
    <div class="name">
        <h2 class="nameButton">Artist</h2>
        <h2 id="artistName"></h2>
        <h4 id="songName">Listen to a song!</h4>
        <div id="buttons">
            <i id="playButton" class="fas fa-play"></i
            <i id="pauseButton" class="fas fa-pause"></i>
        </div>
    </div>
    <h2 style="padding-right:1rem; font-size:13px; color:#efc62c" id="current-time"></h2>
    <canvas id="progress" width="500" height="5"></canvas>
    <h2  style=" padding-left:1rem;" id="duration"></h2>
    <audio ontimeupdate="updateBar()" id="myaudio"  id="player" autoplay>
        <source src="../songs/" type="audio/mpeg"> Your browser does not support the audio element.
    </audio>
</div>
<?php
include_once("COMPONENTS/footer.php");
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../JS/music-related.js" charset="utf-8"></script>
    <script src="../JS/music-player.js" charset="utf-8"></script>
    </body>
    </html>
    <?php
?>
