<?php

  include 'epic.php';
  global $db;
  
  $db->query("UPDATE _user SET locked = 0 WHERE user_id={$_GET['u']};");
  
  header("Location: admin.php");

?>
