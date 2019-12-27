<?php
session_start();
require_once('CONFIG/config.php');
$searched_song = $_POST['searchedSong'];
$sql = "SELECT * FROM songs";
$where_clause = "";
$searched_songs = explode(" ",$searched_song);
$songs = array();
foreach ($searched_songs as $song) {
    $songs[] = " WHERE name LIKE '%$song%'";
}
$real_songs_array = implode(" OR ",$songs);

if(!empty($real_songs_array)){
        $sql .= $real_songs_array;
}
?>
  <!DOCTYPE html>
  <html lang="hu">
    <head>
    <?php include_once("COMPONENTS/headerMeta.php"); ?>
    <title>Welcome <?php echo $_SESSION['username'];?></title>
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
            .list{
            text-align:left!important;
            }
            .list i{
            text-align:left!important;
            }
            .row_inner{
                display: flex;
                align-items: center;
                text-align: center;
                justify-content: center;
                background-color: none;
            }
        </style>
        <header class="nav-dark" id="header">
            <nav class="fill">
                <ul>
                    <img class="logo" src="img/.png" alt="">
                    <li><a href="welcome.php">Főoldal</a></li>
                    <form action="searchedSong.php" method="POST">
                    <input name="searchedSong" class="inputFields" type="text" placeholder="Keresés">
                    </form>
                    <li id="sugo"><a href="#contact"> Sugó</a></li>
                    <li><a href="profile.php"><img class="image-header" src="../profileimages/<?php echo $_SESSION['profpic'];?>" alt=""></a></li>
                    <div  id="button"><a href="logout.php"><i  style="padding:0;" class="fas fa-sign-in-alt fa-1x"></i></a></div>
                    <div  id="grid"><a onclick="changeToGrid()"><i  style="padding:0;" class="fas fa-border-all fa-1x"></i></a></div>
                    <div  id="change"><a><i  style="padding:0;" class="fas fa-adjust fa-1x"></i></a></div>
                </ul>
            </nav>
        </header>
<body>
<div class="container">
<br><br>
<h1>Keresett zeneszám</h1>
<div class="searched-container">
  <?php
  if($dbc = mysqli_connect('localhost', $dbusername, $dbpassword, $dbname)){
      $res = mysqli_query($dbc, $sql);
      while($row = mysqli_fetch_assoc($res)){
          ?>
          <div class="row-inner">
          <div class="tile">
              <h2 class="nameButton"><?php echo $row['artist'];?></h2>
              <h4><?php echo $row['name']; ?></h4>
              <h2>Uploaded by <?php echo $row['uploadedby']; ?></h4>
          <div class="tile-media">
              <img class="tile-img" src="../img/albumcover/<?php echo $row['covername'];?> ">
              <a href="../songs/<?php echo $row['filename']; ?>"></a>
              <i id="playbutton" class="fas fa-play playbutton"></i>
          </div>
          </div>
      </div>
      <?php
      }//while end
      ?>
      <?php
  }
  ?>
</div>


<div class="player">
   <div style="padding-left:3rem;">
      <img style="width:100px;height:auto;" id="playerImage" class="tile__img" src="../img/albumcover/albumcoverbase.png">
      <a href="songs/"></a>
   </div>
   <div class="name">
      <h2 >Előadó</h2>
      <h2 class="nameButton" id="artistName"></h2>
      <h4 id="songName">Játsz zenét!</h4>
      <div id="buttons">
         <i id="playButton" class="fas fa-play fa-xs"></i>
         <i id="pauseButton" class="fas fa-pause fa-xs"></i>
      </div>
   </div>
   <h2 style="padding-right:1rem; font-size:13px; color:#ed2553" id="current-time"></h2>
   <canvas id="progress" width="500" height="5"></canvas>
   <i id="addToPlayList" class="fas fa-plus-circle  fa-1"></i>
   <i class="fas fa-heart  fa-1"></i>
   <h2  style=" padding-left:1rem;" id="duration"></h2>
   <audio ontimeupdate="updateBar()" id="myaudio"  id="player" autoplay>
      <source src="../songs/" type="audio/mpeg">
      Your browser does not support the audio element.
   </audio>
</div>

<?php include_once("COMPONENTS/footer.php"); ?>
<?php include_once("COMPONENTS/footer.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="../JS/music-related.js" charset="utf-8"></script>
<script src="../JS/music-player.js" charset="utf-8"></script>
</div>
</body>
</html>
