<div class="sidebar">
  <div class="profile-image">
      <img style="padding-left:20px;" src="../PROFILEIMAGES/<?php echo $_SESSION['profpic'];?>"  alt="profilkép">
  </div>
  <div class="sidebar-items">
      <a href="welcome.php" class="sidebar-item">
          <i id="addPlayListButton" class="fas fa-plus-circle  fa-1x"></i>
          <span><h2><?php echo $_SESSION['username'];?></h2></span>
      </a>
        <a href="welcome.php" class="sidebar-item">
            <i id="addPlayListButton" class="fas fa-plus-circle  fa-1x"></i>
            <span><h2>Böngészés</h2></span>
        </a>
        <a href="activity.php" class="sidebar-item">
            <i id="addPlayListButton" class="fas fa-user  fa-1x"></i>
            <span><h2>Aktivitás</h2></span>
        </a>
        <a href="welcome.php" class="sidebar-item">
            <i id="addPlayListButton" class="fas fa-music  fa-1x"></i>
            <span><h2>Zenék</h2></span>
        </a>
        <a href="artists.php" class="sidebar-item">
            <i id="addPlayListButton" class="fas fa-users  fa-1x"></i>
            <span><h2>Zenészek</h2></span>
        </a>
        <a href="displayPlayList.php" class="sidebar-item">
            <i id="addPlayListButton" class="fas fa-list-alt  fa-1x"></i>
            <span><h2>Lista</h2></span>
        </a>
    </div>
</div>
