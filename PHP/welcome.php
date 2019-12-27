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
  <html lang="en">
    <head>
    <?php include_once("COMPONENTS/headerMeta.php"); ?>
    <title>Welcome <?php echo $_SESSION['username'];?></title>
</head>
    <body onload="loadSpinner()" class="bodyblack">
      <div id="loader" class="spinner">
        <svg viewBox="0 0 100 100">
          <circle cx="50" cy="50" r="15" />
        </svg>
      </div>
        <style>
            h2 {
                color: grey;
            }
            i:hover{
              cursor:pointer;
            }
            .list{
              text-align:left!important;
            }
            .list i{
              text-align:left!important;
            }
            .material-button{
              margin:1rem;
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
            <div id="change"><a  href="#"><i style="padding:0;" class="fas fa-adjust fa-1x"></i></a></div>
            <div id="grid"><a  href="#"><i style="padding:0;" class="fas fa-th-large fa-1x"></i></a></div>
             </ul>
           </nav>
        </header>

  <div class="divider">
    <?php
    include_once('COMPONENTS/sidebar.php');
    ?>
  <form  class="hide playlistForm"  action="createPlayList.php" method="post">
    <input style="width:50%!important;" class="uploadmusic" type="text" name="userPlaylistName" placeholder="Playlist name">
  </form>
  <div class="container">
  <div class="genres" style="margin-top:100px; padding-bottom:50px;">
  <a href="#Alternativ"><button   class="material-button" type="button">Alternatív</button></a>
  <a href="#Tropical"><button   class="material-button" type="button">Tropical</button></a>
  <a href="#Rap"><button   class="material-button" type="button">Rap</button></a>
  <a href="#Classical"><button   class="material-button" type="button">Classical</button></a>
  <a href="#Pop"><button   class="material-button" type="button">Pop</button></a>
  <a href="#Future"><button   class="material-button" type="button">Future</button></a>
  </div>
  <?php include_once("COMPONENTS/displayMusic.php");?>
</div>
</div>
<?php include_once("COMPONENTS/player.php");?>
</div>
<a id="github" href="http://www.github.com/woltery99">
    <i class="github fab fa-github-alt fa-2x"></i>
</a>
<?php include_once("COMPONENTS/footer.php"); ?>
<script type="text/javascript" src="../JS/jquery-3.4.1.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/music-player.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/script.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/main.js" charset="utf-8"></script>
<script type="text/javascript" src="../JS/music-related.js" charset="utf-8"></script>
</body>
</html>
