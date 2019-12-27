<div class="player">
   <div style="padding-left:3rem;">
      <img style="width:100px;height:auto;" id="playerImage"  src="../img/albumcover/albumcoverbase.png">

   </div>
   <div class="name">
      <h2 >Előadó</h2>
      <h2 class="nameButton" id="artistName"></h2>
      <h4 id="songName">Játsz zenét!</h4>
      <div id="buttons">
         <i id="playButton" class="fas fa-play fa-xs"></i>
         <i id="pauseButton" class="fas fa-pause fa-xs"></i>
         <a id="downloadButton" download="filename.mp3" href='../songs/'><i class="fas fa-download"></i></a>
         <i class="fas fa-heart  fa-1"></i>
      </div>
   </div>
   <h2 style="padding-right:1rem; font-size:13px; color:#ed2553" id="current-time"></h2>
   <canvas id="progress" width="500" height="5"></canvas>
   <i id="addToPlayList" class="fas fa-plus-circle  fa-1"></i>
   <h2  style=" padding-left:1rem;" id="duration"></h2>
   <img style="margin-left: 2rem;width:100px;height:100px;" src="../IMG/myMusicLogo.png" alt="">
   <audio ontimeupdate="updateBar()" id="myaudio"  id="player" autoplay>
      <source src="../songs/" type="audio/mpeg">
      Your browser does not support the audio element.
   </audio>
</div>
