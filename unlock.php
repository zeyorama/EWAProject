<?php

  include 'epic.php';
  global $db;
  
  if (isset($_GET['u'])) {
    $db->query("UPDATE _user SET locked = 0 WHERE user_id={$_GET['u']};");
  
  } else if (isset($_GET['v'])) {
    $db->query("UPDATE _video SET locked = 0 WHERE video_id={$_GET['v']};");
  
  } else if (isset($_GET['e'])) {
    $db->query("UPDATE _event SET locked = 0 WHERE event_id={$_GET['e']};");
  
  }
  
  header("Location: admin.php");

?>
