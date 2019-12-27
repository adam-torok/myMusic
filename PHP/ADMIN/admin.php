
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php include_once("adminHeaderMeta.php"); ?>
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
<header class="nav-dark" id="header">
    <div><a href="admin.php">ZENÉK</a></div>
     <div><a href="users.php">FELHASZNÁLÓK</a> </div>
</header>
<div class="wrapper">
<?php
//include_once('authorize.php');
require_once('../CONFIG/config.php');
error_reporting(0);

// MŰKÖDÉSRŐL BŐVEBBEN : https://github.com/woltery99/myMusic/wiki
// Az adatok kiolvasása az adatbázisból
$query = "SELECT * FROM songs ORDER BY id DESC";
$data = mysqli_query($dbc,$query);

echo '<table style="width:100%" class="table-striped table-dark table-bordered table-hover">';
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
<?php
include_once("../COMPONENTS/footer.php");
?>
</html>
<?php
