<?php 
session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "qwert";
$dbname = "felhasznalo";

//csatlakozás felépítése
$link = @mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
// - ha beküldöd a zenét 
if(isset($_POST['save_music'])){
 $musicFileName = $_FILES['musicUpLoad']['name'];
 $musicFileName = strtolower($musicFileName);
 $musicName =  mysqli_real_escape_string($link,$_POST['nameofmusic']);
 //$genre = mysqli_real_escape_string($link,$_POST['genreofmusic']);
 $genre = mysqli_real_escape_string($link,$_POST['genreofmusic']);

 switch ($genre) {
    case 'Rap':
        $genre= 'Rap';
        break;
        case 'Alternatív':
        $genre= 'Alternatív';
        break;
        case 'Classical':
        $genre= 'Classical';
        break;
        case 'Pop':
        $genre= 'Pop';
        break;
        case 'Tropical':
        $genre= 'Tropical';
        break;
        case 'Future':
        $genre= 'Future';
        break;
}

 $artist = mysqli_real_escape_string($link,$_POST['artistofmusic']);
 $username =  mysqli_real_escape_string($link,$_SESSION['username']);
 $musicName = strtolower($musicName); 
 $coverName = $_FILES['albumUpload']['name'];
 $coverName = strtolower($coverName);

 $a = $artist;
 $mn = $musicName;
 $g = $genre;
 $mfn = $musicFileName;
 $c = $coverName;
 $u = $username;

 $target = '../songs/' . $musicFileName; 
 $targetForAlbum = '../img/albumcover/'. $coverName;
 /* if(move_uploaded_file($_FILES['musicUpLoad']['tmp_name'],$target) && (move_uploaded_file($_FILES['albumUpload']['tmp_name'],$targetForAlbum))) {
    $sql = "INSERT INTO songs (artist, name, genre, filename, covername, uploadedby) VALUES ('$artist', '$musicName', '$genre', '$musicFileName', '$coverName', '$username')";
    if(mysqli_query($link,$sql)){
        echo "something";
        header("Location: welcome.php");
             }
         else echo "<script> alert('Music did not uploaded.')</script>.";    
} */


//PREPARED STATEMENTEK, A VÉDELEM ÉRDEKÉBEN
if(move_uploaded_file($_FILES['musicUpLoad']['tmp_name'],$target) && (move_uploaded_file($_FILES['albumUpload']['tmp_name'],$targetForAlbum))) {
    $sql = "INSERT INTO songs (artist, name, genre, filename, covername, uploadedby) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($link);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement Failed";
    }
    else{
        mysqli_stmt_bind_param($stmt, "ssssss",$a,$mn,$g,$mfn,$c,$u);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
    header("Location: welcome.php");

}
}

?>