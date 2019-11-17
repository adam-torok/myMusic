
<?php
session_start();
error_reporting(E_ALL);
require_once('config.php');

$dbc = mysqli_connect('localhost', $dbusername, $dbpassword, $dbname);

$id = $_SESSION['id'];
$songName = $_GET['songname'];
echo $songName;
$song_ID = "";
$playlistID ="";
$query = "SELECT * FROM songs WHERE name = '$songName'";

$result = mysqli_query($dbc,$query);
while($row = mysqli_fetch_assoc($result)) {
        $song_ID = $row['id'];
    }
    echo "<br>";
$query = "SELECT * FROM playlists WHERE user_id = '$id'";
$result = mysqli_query($dbc,$query);
while($row = mysqli_fetch_assoc($result)) {
        $playlistID = $row['id'];
    }
    echo $song_ID . "user-id" .$id. "playlist-id" .$playlistID;
$query = "INSERT INTO playlist_songs (playlist_id, song_id) VALUES ('$playlistID','$song_ID')";
if(mysqli_query($dbc,$query)){
    header("Location: welcome.php");
}
mysqli_close();


