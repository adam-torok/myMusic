
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <?php include_once("adminHeaderMeta.php"); ?>
  <title>Welcome <?php echo $_SESSION['username'];?></title>
</head>
<style media="screen">
  h2{
    color:white;
  }
</style>
<body>

<header class="nav-dark" id="header">
    <div><a href="admin.php">ZENÉK</a></div>
     <div><a href="users.php">FELHASZNÁLÓK</a> </div>
</header>
<div style="padding-top:5rem;" class="wrapper">

<?php
//require_once('../CONFIG/authorize.php');
require_once("../CONFIG/config.php");

// Az adatok kiolvasása az adatbázisból
$query = "SELECT * FROM felhasznalo ORDER BY id DESC";
$data = mysqli_query($dbc,$query);

echo '<table style="width:100%"class="table-striped table-dark table-bordered table-hover">';
echo '<th><h4>ID</th>' ;
echo '<th><h4>Felhasználónév</h3></td>' ;
echo '<th><h4>Jelszó</td>' ;
echo '<th><h4>Email</th>' ;
echo  '<th><h4>Profilkép</th>';
echo  '<th><h4>Regisztráció dátuma</th>';
echo  '<th><h4>Törlés</th>';


// A felhasználók tömbjének bejárása while ciklussal
while($row = mysqli_fetch_array($data)){
 //számok megjelenítése

 echo '<tr class="removeTable"><td><h2>' . $row['id'] . '</h3></td>' ;

 echo '<td><h2>' .$row['felhnev']  . '</td>' ;
 echo '<td><h2>' .$row['jelszo']  . '</td>' ;
 echo '<td><h2>' .$row['email'] . '</td>';
 echo  '<td><h2>' .$row['profile_image'].'</td>';
 echo  '<td><h2>' .$row['time'].'</td>';
 echo  '<td><a  href="removeUser.php?id=' . $row['id'] . '&amp;felhnev='. $row['felhnev'] . '&amp;jelszo=' . $row['jelszo'] .
 '&amp;email=' . $row['email'].'"><h2 style=" color:#f05123 ;">Törlés</h3></a></td></tr>';
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
