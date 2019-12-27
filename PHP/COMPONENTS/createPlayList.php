<?php
include("CONFIG/config.php");
// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
session_start();
$dbc = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
$id = $_SESSION['id'];
$playlistName  = $_POST['userPlaylistName'];
echo $song;
echo $id;
if(isset($playlistName)){
    echo $playlistName;
    $query = "INSERT INTO playlists (`title`, `user_id`) values ('$playlistName', '$id')";
    if(mysqli_query($dbc,$query)){
        header("Location: ../welcome.php");
    }
}
mysqli_close();
