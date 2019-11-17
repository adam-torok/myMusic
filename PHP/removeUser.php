
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
if(isset($_GET['id']) && isset($_GET['felhnev']) && isset($_GET['jelszo']) && isset($_GET['email'])){
    $id = $_GET['id'];
    $felhnev = $_GET['felhnev'];
    $jelszo = $_GET['jelszo'];
    $email = $_GET['email'];
}

else if(isset($_POST['id']) && isset($_POST['felhnev']) && isset($_POST['jelszo']) && isset($_POST['email'])){
//Pontszámok kinyerése a POST  tömbből
    $id = $_POST['id'];
    $felhnev = $_POST['felhnev'];
    $jelszo = $_POST['jelszo'];
    $email = $_POST['email'];
}
else {
    echo "Sajnáljuk, nem választott ki felhasználót!";
}
// --- --- ----- --- --
if(isset($_POST['submit'])){
    if($_POST['confirm'] == 'Yes'){
        $dbc = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
        $query = "DELETE FROM felhasznalo WHERE id=$id LIMIT 1";
        mysqli_query($dbc,$query);
        mysqli_close($dbc); 
        echo '<p>'. $felhnev .' törölve az adatbázisból!</p>';
    }
    else{
        echo '<p> A zene nem lett törölve.</p>';
    }
}
else if(isset($id) && isset($felhnev) && isset($jelszo) && isset($email) ){
echo '<p>Biztosan kitörlöd ezt a számot? <br>'.$felhnev .'</p>';
echo '<form action="removeUser.php" method="POST">';
echo '<input  type="radio" name="confirm" value="Yes" /><h2> IGEN </h2>';
echo '<input  type="radio" name="confirm" value="No" /><h2> NEM </h2> ';
echo '<br>';
echo '<input class="uploadmusic" type="submit" name="submit" value="Törlés"/>';
echo '<input type="hidden" name="id" value="'.$id.'"/>';
echo '<input type="hidden" name="felhnev" value="'.$felhnev.'"/>';
echo '<input type="hidden" name="jelszo" value="'.$jelszo.'"/>';
echo '<input type="hidden" name="email" value="'.$email.'"/>';
echo '</form>';
}
echo '<h2><a href="admin.php">Vissza az admin oldalra!</a></p>';

?></div>

</body>
</html>
