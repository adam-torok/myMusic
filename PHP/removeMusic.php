
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../HTML/CSS/main.css">
    <link rel="stylesheet" href="../HTML/CSS/fonts.css">
    <link rel="stylesheet" href="../HTML/CSS/header.css">
    <link rel="stylesheet" href="../HTML/CSS/footer.css">
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
require_once('authorize.php');
require_once("config.php");
require_once("files.php");
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
