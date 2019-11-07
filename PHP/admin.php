
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
    <title>Admin felület</title>
</head>
<body>
<style>
*{
  text-align:left!important;
}
td{
  padding:0.5rem;
  border-bottom:1px dashed white;
}
table{
  border: 1px solid white;
  border-radius:10px;
  padding:1rem;
}
h3{
  color:white;
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
</style>
<div class="wrapper">
<?php
require_once('authorize.php');
require_once("config.php");

// Az adatok kiolvasása az adatbázisból
$dbc = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
$query = "SELECT * FROM songs ORDER BY id DESC";

$data = mysqli_query($dbc,$query);

echo '<table>'; 
echo '<th><h3>Artista</h3></td>' ;
echo '<th><h3>ID</td>' ;
echo '<th><h3>Zeneszám</th>' ;
echo '<th><h3>Műfaj</th>' ;
echo  '<th><h3>Uploadedby</th>';
echo  '<th><h3>Művelet</th>';
echo  '<th><h3>Művelet</th>';

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
