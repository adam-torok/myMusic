
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once("adminHeaderMeta.php"); ?>
    <title>Biztosan törölsz?</title>
</head>
<body>
    <style>
    .wrapper{
    grid-template-columns:1fr;
    justify-content: center;
    align-items: center;
    justify-items: center;
    margin:3rem;
    }
    </style>
<div class="wrapper">

<?php
//require_once('CONFIG/authorize.php');
require_once("CONFIG/config.php");
// Két féle reagálás, GET / POST esetében.
if(isset($_GET['id']) && isset($_GET['artist']) && isset($_GET['name']) && isset($_GET['genre'])){
    $id = $_GET['id'];
    $artist = $_GET['artist'];
    $name = $_GET['name'];
    $genre = $_GET['genre'];
}

else if(isset($_POST['id']) && isset($_POST['artist']) && isset($_POST['name']) && isset($_POST['genre'])){
//Pontszámok kinyerése a POST  tömbből
    $id = $_POST['id'];
    $artist = $_POST['artist'];
    $name = $_POST['name'];
    $genre = $_POST['genre'];
}
else {
    echo "Sajnáljuk, nem választott ki zenét!";
}
// --- --- ----- --- --
if(isset($_POST['submit'])){
    if($_POST['confirm'] == 'Yes'){
        $dbc = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
        $query = "DELETE FROM songs WHERE id=$id LIMIT 1";
        mysqli_query($dbc,$query);
        mysqli_close($dbc);
        echo '<p>'. $artist .$name.' törölve az adatbázisból!</p>';
    }
    else{
        echo '<p> A zene nem lett törölve.</p>';
    }
}
else if(isset($id) && isset($artist) && isset($name) && isset($genre) ){
echo '<p>Biztosan kitörlöd ezt a számot? <br>'.$artist . " " .$name . '</p>';
echo '<form action="removeMusic.php" method="POST">';
echo '<input  type="radio" name="confirm" value="Yes" /><h2> IGEN </h2>';
echo '<input  type="radio" name="confirm" value="No" /><h2> NEM </h2> ';
echo '<br>';
echo '<input class="uploadmusic" type="submit" name="submit" value="Törlés"/>';
echo '<input type="hidden" name="id" value="'.$id.'"/>';
echo '<input type="hidden" name="artist" value="'.$artist.'"/>';
echo '<input type="hidden" name="name" value="'.$name.'"/>';
echo '<input type="hidden" name="genre" value="'.$genre.'"/>';
echo '</form>';
}
echo '<h2><a href="admin.php">Vissza az admin oldalra!</a></p>';

?></div>

</body>
</html>
