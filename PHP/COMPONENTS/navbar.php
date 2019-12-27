<?php
session_start();
?>
<header class="nav-dark" id="header">
    <nav class="fill">
        <ul>
            <img style="width:50px;height:50px;" src="../IMG/myMusicLogo.png" alt="">
            <li><a href="welcome.php">Főoldal</a></li>
            <input name="searchedSong" class="inputFields" type="text" placeholder="Keresés">
            <li id="sugo"><a href="https://github.com/woltery99/myMusic/wiki">Sugó</a></li>
            <li><a href="profile.php"><img class="image-header" src="../profileimages/<?php echo $profpic;?>" alt=""></a></li>
            <div id="button"><a href="../PHP/logout.php"><i style="padding:0;" class="fas fa-sign-in-alt fa-1x"></i></a></div>
            <div id="change"><a href="#"><i style="padding:0;color:grey;" class="fas fa-adjust fa-1x"></i></a></div>
        </ul>
    </nav>
</header>
