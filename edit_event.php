<?php

  include 'epic.php';
	
  if(!function_exists("signed_in")) {
  	die("Unavailable Site");
  }
  
  
  $name = $_POST['name'];
  $description = $_POST['description'];
  $location = $_POST['location'];
  $start = $_POST['start'];
  
  if ($location == "") {
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
  
  
  global $db, $user;
 
  $db->prepare("UPDATE _event SET startDate = ?,location = ?,description = ?,name = ? WHERE event_id = ?;");
  $db->exe_prepare('sssss',$start, $location, $description, $name, $_POST['id']);
  
  header("Location: index.php?events");

?>
