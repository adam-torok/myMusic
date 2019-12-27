<?php
session_start();
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
require_once('CONFIG/config.php');
//csatlakozás felépítése

$bio = $_SESSION['bio'];
$profpic = $_SESSION['profpic'];
if(mysqli_connect_error()) die('nem sikerült a db csatlakozás');
?>
<!DOCTYPE html>
<html lang="hu">
    <?php include_once("COMPONENTS/headerMeta.php");?>
        <title>Üdvözlünk
            <?php echo $_SESSION['username'];?>
        </title>
    </head>
<body class="bodyblack">
<header class="nav-dark" id="header">
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
<?php
include_once('COMPONENTS/sidebar.php');
?>
  <form class="hide playlistForm"  action="createPlayList.php" method="post">
    <input style="width:50%!important;" class="uploadmusic" type="text" name="userPlaylistName" placeholder="Playlist name">
  </form>

  <div class="track-container">
  <div class="searched-header">
  <h2>Az összes jelenlegi</h2>
  <h1>ZENÉSZEK</h1>
  </div>
          <?php $sql = "SELECT DISTINCT artist, genre FROM songs";
          $result = mysqli_query($dbc,$sql);
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
</div>


<?php
include_once("COMPONENTS/footer.php");
?>

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
        // A source dbc felépítése, és css-be beszúrása.
        albumsource = "url(" + albumsource + ")";
            var headerChange = $(".searched-header").css("background","linear-gradient(rgba(17, 17, 17, 0.9), rgba(18, 18, 18,1)),"+albumsource);
        // Keresd meg a source-t
        // tedd bele a dbcet
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
