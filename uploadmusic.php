<?php 
session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "qwert";
$dbname = "felhasznalo";
//csatlakozás felépítése
$link = @mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
// - ha beküldöd a zenét 
if(isset($_POST['save_music'])){
 $coverName = $_FILES['albumUpload']['name'];
 $coverName = strtolower($coverName);
 $musicFileName = $_FILES['musicUpLoad']['name'];
 $musicFileName = strtolower($musicFileName);
 $musicName =   $_POST['nameofmusic'];
 $musicName = strtolower($musicName); 
 $genree = $_POST['genreofmusic'];
 $artistt = $_POST['artistofmusic'];

 //még mindig van valami probléma, megoldást találni holnap.

$target = 'songs/' . $musicFileName; // musicname volt 
$targetForAlbum = 'img/albumcover/'. $coverName;
 if(move_uploaded_file($_FILES['musicUpLoad']['tmp_name'],$target) && move_uploaded_file($_FILES['albumUpload']['tmp_name'],$targetForAlbum)){
    $sql = "INSERT INTO songs (artist, name, genre, filename, covername) VALUES ('$artistt', '$musicName', '$genree', '$musicFileName', '$coverName')";
    if(mysqli_query($link,$sql)){
       //eddig működött, 
             echo "<script> alert('Successful upload.')</script>.";    
         }
         else echo "Push to DB  failed. ".$coverName." ".$targetForAlbum;
      }
      else echo "<script> alert('Cover did not  uploaded.')</script>.";    
   }
 

?>