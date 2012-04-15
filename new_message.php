<?php

  include 'epic.php';
  
  if(!function_exists("signed_in")) {
  	die("Unavailable Site");
  }
  
  
  global $db, $user;
  
  $to = $_POST['to'];
  $subject = $_POST['subject'];
  $content = $_POST['content'];
  $time = date('Y-m-d H:i:s');
  
  $db->prepare("SELECT * FROM _user WHERE user_id = {$user->getId()}");
  $db->exe_prepare();
  if ($cuser = $db->get_next_result("User")) {
  
  	while($db->get_next_result("User"));
  
	  $db->prepare("SELECT * FROM _user WHERE nick = ?;");
	  $db->exe_prepare("s", $to);
	  if ($to = $db->get_next_result("User")) {
  	
	  	while($db->get_next_result("User"));
	  	
	  	
		  if ($subject == "") {
		    $name = "No Subject";
		  }
		  
		  if ($content == "") {
		    $description = "No Text";
		  }
		 
		  $db->prepare("INSERT INTO _pn(subject, content, sendDate, from_user, to_user) VALUES(?,?,?,?,?);");
		  $db->exe_prepare('sssii',$subject, $content, $time, $user->getId(), $to->getId());
		  
		  header("Location: index.php?messages");
	  } else {
		  header("Location: index.php?new_message&error");
	  }
  } else {
  	echo "User not exists";
  }
?>
