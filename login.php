<?php
            session_start();

include_once("config.php");
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM felhasznalo WHERE felhnev = '$username' AND jelszo ='$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 1){

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
    
      $conn->close();
        
}
else{
    echo "<p>Invalid password</p>";

}

?>