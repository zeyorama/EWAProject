<?php

  include 'epic.php';
  
  $name = $_POST['name'];
  $description = $_POST['description'];
  $location = $_POST['location'];
  $start = $_POST['start'];
  
  if ($loaction == "") {
    $location = "undef";
  }
  
  if ($name == "") {
    $name = "noname";
  }
  
  if ($description == "") {
    $description = "no description";
  }
  
  if ($start == "") {
    $start = date('Y-m-d H:i:s');
  }
  
  
  global $db;
  $db->prepare("INSERT INTO _event(startDate,location,description,owner_user_id,locked,FSK,name) VALUES(?,?,?,{$_POST['id']},1,0,?);");
  $db->exe_prepare('ssss',$start, $location, $description, $name);
  
  header("Location: index.php?events");

?>
