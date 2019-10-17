<?php
session_start();
include_once(login.php);

$host = "localhost";
$dbusername = "root";
$dbpassword = "qwert";
$dbname = "felhasznalo";

//csatlakozás felépítése
$link = @mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
$username = $_POST['username'];
$password = $_POST['password'];
$bio = $_SESSION['bio'];
$profpic = $_SESSION['profpic'];

if(mysqli_connect_error()) die('nem sikerült a db csatlakozás');
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <link rel="icon" type="image/png" href="compact-disc.png">
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" href="main.css">
        <script src="https://kit.fontawesome.com/75ad4010ea.js" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, content="width=1000" maximum-scale=1, user-scalable=no"/> <!--320-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Üdvözlünk
            <?php echo $_SESSION['username'];?>
        </title>
    </head>
    <body>
        <style>
            body {
                background-color:#F2F2F2;
            }
            h2 {
                color: grey;
            }
            h4{
                color: black;

            }
        </style>
        <header class="nav-down" id="header">
            <nav class="fill">
                <ul>
                    <img class="logo" src="img/.png" alt="">
                    <li><a href="welcome.php">Főoldal</a></li>
             
                    <input type="text" placeholder="Keresés">
                    <li id="sugo"><a href="#contact"> Sugó</a></li>
                    <li><a href="profile.php"><img class="image-header" src="profileimages/<?php echo $profpic;?>" alt=""></a></li>
                    <div id="button"><a href="logout.php"><i class="fas fa-sign-in-alt fa-1x"></i></a></div>
                    <div id="change"><a onclick="changeStyle()" href="#"><i class="fas fa-adjust fa-1x"></i></a></div>
                </ul>
            </nav>
        </header>
        <div class="genres" style="margin-top:100px; padding-bottom:50px;">

<button class="btn" type="button"><span>Rock</span></button>
<button class="btn" type="button"><span>Pop</span></button>
<button class="btn" type="button"><span>Classical</span></button>
<button class="btn" type="button"><span>Workout</span></button>

<div class="popup">
    <div class="popup-inside">
    <form method="POST" action="sendmail.php">
        <a href="#" id="close-button" title="Kattintson ide a bezáráshoz.">[ X ]</a>
        <h1>Iratkozz fel hírlevelünkre!</h1>
        <h2>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit, deserunt!</h2>
         <input class="forminput" type="email" name="email" id="email" placeholder="Email címed">
         <br>
         <input class="forminput" type="submit" value="FELIRATKOZÁS!">

    </form>
    </div>
</div>

</div>
        <div id="mycontainer" class="wrapper">
     
            <?php $sql = "SELECT * FROM songs";
        $result = mysqli_query($link,$sql);

 while($row = mysqli_fetch_assoc($result)) {
    ?>
                <div id="profile" class="profile">
                
                <div  class="img" style="background-image: url(img/albumcover/<?php echo $row['covername'];?> ">
                  
                    </div>
                      
                <div class="text" style="padding-left:15px;">
                            <h2><?php echo $row['artist'];?></h2>
                            <h4><?php echo $row['name']; ?></h4>
                            <h2><?php echo $row['genre']; ?></h2>
                            <h4><?php echo $row['time']; ?></h4>
                         
                            <audio controls style="padding:15px 15px 15px 0px;">
         <source src="songs/<?php echo $row['filename']; ?>" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>   
                    <div style="padding-left:10px;">
                    <i class="far fa-heart"></i>
                        <i class="far fa-comment-alt"></i>
                        <i class="far fa-bell"></i> 
                     </div>
                    </div> 
                </div>
                <?php 
      } ?>
        </div>
        </div>
        </div>
        </div>
        
        </div>
        
        <div class="footer">
            <ul>
                <li>
                    <h2>Rólunk</h2> </li>
                <li>Rólunk</li>
                <li>Állások</li>
                <li>For The Record</li>
            </ul>
            <ul>
                <li>
                    <h2>Közösségek</h2> </li>
                <li>Előadóknak</li>
                <li>Fejlesztők</li>
                <li>Szállítók</li>
            </ul>

            <ul>
                <li>
                    <h2>Hivatkozások</h2> </li>
                <li>Sugó</li>
                <li>Webes lejátszó</li>
                <li>Történetünk</li>

            </ul>
            <ul class="socials">
                <li><i class="fab fa-github-square fa-3x"></i> </li>
                <li><i class="fab fa-linkedin fa-3x"></i> </li>
                <li><i class="fab fa-facebook-square fa-3x"></i> </li>

            </ul>

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
        
        // NIGHT MODE-RA VÁLTÁS
        $("#change").click(function(){
        $(".profile").toggleClass("profileblack");
        $("body").toggleClass("bodyblack");
        });
        // POPUP BEZÁRÁSA.
        $("#close-button").click(function(){
            $(".popup").css("display","none");
        });
});
</script>
        <script>
        function changeStyle() {
                var element = document.getElementById("mycontainer");
                element.classList.toggle("wrapperblack");
            }
        </script>
    </body>
    </html>

    