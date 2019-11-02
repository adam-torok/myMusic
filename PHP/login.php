<?php
session_start();
// Session indítása
include_once("config.php");
// Config file, itt tárolom a connection-hoz való adatokat.
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
//Ezek a bejelentkező formból nyert adatok
$username = mysqli_real_escape_string($conn,$_POST['username']); //A form-ba beírt felhasználónév
$password = mysqli_real_escape_string($conn,$_POST['password']); //A form-ba beírt jelszó
$sql = "SELECT * FROM felhasznalo WHERE felhnev = '$username' AND jelszo ='$password'";
// SQL parancs, Ez azt nézi meg, hogy van e ilyen felhasználónév, jelszó párosítás.
$result = mysqli_query($conn,$sql);
//A result változóba tárolom el a lekérdezést
if(mysqli_num_rows($result) == 1){
// Itt megnézem, hogy csakis ha egy ilyen párosítás van, akkor engedjen be, és lekérem a többi adatot.
       while($row = mysqli_fetch_assoc($result)){
            $username = $row["felhnev"];
            $passord = $row["jelszo"];
            $time = $row["time"];
            $id = $row["id"];
            $profpic = $row["profile_image"];
            $bio = $row["bio"];
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $passord;
            $_SESSION['time'] = $time;
            $_SESSION['id'] = $id;
            $_SESSION['profpic'] = $profpic;
            $_SESSION['bio'] = $bio;
        }
      header("Location: welcome.php");
      //A welcome.php-ra átírányítom a felhasználót.
      $conn->close();
      //Adatbázis kapcsolat bezárása.
}
else{
    echo "<p>Invalid password</p>";
    //Ha nem jó a jelszó, hibaüzenetet ír ki.
}
?>