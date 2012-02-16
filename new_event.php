<?php

  include 'epic.php';
  
  global $db;
  $db->prepare("INSERT INTO _event(startDate,location,description,owner_user_id,locked,FSK,name) VALUES(?,?,?,{$_POST['id']},1,0,?);");
  $db->exe_prepare('ssss',$_POST['start'], $_POST['location'], $_POST['description'], $_POST['name']);
  
  header("Location: index.php?events");

?>
