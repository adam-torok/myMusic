
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../HTML/CSS/main.css">
    <link rel="stylesheet" href="../HTML/CSS/fonts.css">
    <link rel="stylesheet" href="../HTML/CSS/header.css">
    <link rel="stylesheet" href="../HTML/CSS/footer.css">
    <title>Admin felület</title>
</head>
<body>
<style>
*{
  text-align:center!important;
}
table{
  padding:1rem!important;
}
h3{
  color:white;
}
th{
  position: sticky;
  top: 45px;
  background-color:grey;
}
h2{
  color:white;
}
p{
  color:red;
}
.wrapper{
  grid-template-columns:1fr;
  margin:3rem;
}
header a{
    border: none!important;
}
</style>
<header class="nav-down" id="header">
    <div><a href="admin.php">ZENÉK</a></div>
     <div><a href="users.php">FELHASZNÁLÓK</a> </div> 
</header>
<div class="wrapper">
<h1 style="color:white">ADMIN FELÜLET - ZENÉK</h1>
<?php
require_once('authorize.php');
require_once("config.php");

// Az adatok kiolvasása az adatbázisból
$dbc = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
$query = "SELECT * FROM songs ORDER BY id DESC";
$data = mysqli_query($dbc,$query);

echo '<table class="table-striped table-dark table-bordered table-hover">'; 
echo '<th><h4>Artista</h3></td>' ;
echo '<th><h4>ID</td>' ;
echo '<th><h4>Zeneszám</th>' ;
echo '<th><h4>Műfaj</th>' ;
echo  '<th><h4>Uploadedby</th>';
echo  '<th><h4>Jóváhagyva</th>';
echo  '<th><h4>Művelet</th>';
echo  '<th><h4>Művelet</th>';

// A felhasználók tömbjének bejárása while ciklussal
while($row = mysqli_fetch_array($data)){
 //számok megjelenítése 

 echo '<tr class="removeTable"><td><h2>' . $row['artist'] . '</h3></td>' ;
 
 echo '<td><h2>' .$row['id']  . '</td>' ;
 echo '<td><h2>' .$row['name']  . '</td>' ;
 echo '<td><h2>' .$row['genre'] . '</td>';
 echo  '<td><h2>' .$row['uploadedby'].'</td>';
 echo '<td><h2>' .$row['approved'] . '</td>';
 if($row['approved'] == '0'){
  echo  '<td><a  href="approveMusic.php?id=' . $row['id'] . '&amp;artist='. $row['artist'] . '&amp;name=' . $row['name'] .
  '&amp;genre=' . $row['genre'] . '&amp;uploadedby' . $row['uploadedby'] . '"><h2 style=" color:#f05123 ;">Engedélyezés</h3></a></td>';
 }
 echo  '<td><a  href="removeMusic.php?id=' . $row['id'] . '&amp;artist='. $row['artist'] . '&amp;name=' . $row['name'] .
 '&amp;genre=' . $row['genre'] . '&amp;uploadedby' . $row['uploadedby'] . '"><h2 style=" color:#f05123 ;">Törlés</h3></a></td></tr>'; 
}
echo '</table>';

//adatbázis bontása
mysqli_close($dbc)
?>
</div>

</body>
</html>
<?php
