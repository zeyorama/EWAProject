<?php

  include 'epic.php';
  
  global $db;
  $db->prepare("INSERT INTO _event(startDate,location,description,owner_user_id,locked,FSK,name) VALUES(current_timestamp,'?','?',$_POST['id'],1,'?');");
  $db->exe_prepare($_POST['location'], $_POST['description'], $_POST['name']);
  
  header("Location: index.php?events");

?>
