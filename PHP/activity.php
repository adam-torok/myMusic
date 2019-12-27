<?php
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
session_start();
error_reporting(0);
// Megnézem, hogy bevan e jelentkezve az illető
if(!isset($_SESSION['logged'])){
  header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
}
require_once('CONFIG/config.php');

$bio = $_SESSION['bio'];
$profpic = $_SESSION['profpic'];
$id = $_SESSION['id'];
// NINCS KÉSZ MÉG, KELL AZ ADATBÁZISBAN LÉVŐ LISTA NEVE A LISTA HELYETT.
$getListName = "SELECT title FROM playlists WHERE user_id = '$id'";
?>
  <html lang="hu">
    <head>
    <?php include_once('COMPONENTS/headerMeta.php'); ?>
    <title>Welcome <?php echo $_SESSION['username'];?></title>
</head>
<style media="screen">
.row{
display: grid;
grid-template-columns: 1fr 1fr 1fr;
height:auto;
}
h1{
  color:white;
}
</style>
    <body class="bodyblack">
      <?php include_once("COMPONENTS/navbar.php");?>
  <div class="divider">
  <div style="margin-top:50px"  class="sidebar">
<?php include_once("COMPONENTS/sidebar.php");?>
  <form  class="hide playlistForm"  action="createPlayList.php" method="post">
    <input style="width:50%!important;" class="uploadmusic" type="text" name="userPlaylistName" placeholder="Playlist name">
  </form>
  </div>
  <div class="track-container">
  <div class="searched-header">
  <h2>felhasználói</h2>
  <h1>Aktivitás</h1>
  </div>
  <div class="row">
    <?php $sql = "SELECT * FROM songs WHERE approved = 1 ORDER BY id DESC";
    $result = mysqli_query($dbc,$sql);
    while($row = mysqli_fetch_assoc($result)){
//A lekérdezésnek megfelelően egy row változóba teszem a resultot
    ?>
      <div class="row-inner">
        <div class="tile">
          <h2 class="nameButton">Feltöltő: <?php echo $row['artist'];?></h2>
          <h4><?php echo $row['name']; ?></h4>
          <h2>Műfaj: <?php echo $row['genre'];?></h2>
          <h2>Feltöltötte: <?php echo $row['uploadedby']; ?></h4>
          <h2>Feltöltés ideje: <?php echo substr($row['time'],0,10); ?></h4>
        <div class="tile-media">
          <img class="tile-img" src="../img/albumcover/<?php echo $row['covername'];?> ">
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
        <div style="padding-left:3rem;" class="tile__media">
            <img style="width:100px;height:auto;" id="playerImage" class="tile__img" src="../img/albumcover/albumcoverbase.png">
            <a href="songs/"></a>
        </div>
        <div class="name">
            <h2 class="nameButton">Előadó</h2>
            <h2 id="artistName"></h2>
            <h4 id="songName">Listen to a song!</h4>
            <div id="buttons">
                <i id="playButton" class="fas fa-play fa-xs"></i>
                <i id="pauseButton" class="fas fa-pause fa-xs"></i>
            </div>
        </div>
        <h2 style="padding-right:1rem; font-size:13px; color:#ed2553" id="current-time"></h2>
        <canvas id="progress" width="500" height="5"></canvas>
        <i id="addToPlayList" class="fas fa-plus-circle  fa-1"></i>
        <i class="fas fa-heart  fa-1"></i>
        <h2 style=" padding-left:1rem;" id="duration"></h2>
        <audio ontimeupdate="updateBar()" id="myaudio" id="player" autoplay>
            <source src="../songs/" type="audio/mpeg"> Your browser does not support the audio element.
        </audio>
    </div>

    </div>
    <a id="github" href="http://www.github.com/woltery99">
        <i class="fab fa-github-alt fa-2x"></i>
    </a>
    <?php include_once("COMPONENTS/footer.php"); ?>
    <script type="text/javascript" src="../JS/jquery-3.4.1.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="../JS/music-player.js" charset="utf-8"></script>
    <script type="text/javascript" src="../JS/script.js" charset="utf-8"></script>
    <script type="text/javascript" src="../JS/main.js" charset="utf-8"></script>
    <script type="text/javascript" src="../JS/music-related.js" charset="utf-8"></script>
    </body>
    </html>
