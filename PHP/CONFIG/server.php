<?php
session_start();
require_once('CONFIG/config.php');
error_reporting(1);

$userId = 79;
if(isset($_POST['action'])){
  $postID = $_POST['postID'];
  $action = $_POST['action'];
  switch ($action) {
    case 'like':
      $sql = "INSERT INTO likes (songId, userId, action)
      VALUES ($postID, $userId, '$action')
      ON DUPLICATE KEY UPDATE action = 'like'";
      break;
    case 'dislike':
        $sql = "INSERT INTO likes (songId, userId, action) VALUES ($postID, $userId, $action)
        ON DUPLICATE KEY UPDATE action = 'dislike'";
        break;
      case 'dislike':
        $sql = "DELETE FROM likes WHERE userID=$userId AND songID=$postID";
        break;
      case 'undislike':
          $sql = "DELETE FROM likes WHERE userID=$userId AND songID=$postID";
        break;
    default:
      break;
      mysqli_query($dbc,$sql);
      exit(0);
  }
}
 ?>
