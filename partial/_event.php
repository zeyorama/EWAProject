<?php

	global $user, $db;

	if(isset($_GET['events'])) {
	  if($_GET['events'] != "") {
		  $id = $_GET['events'];
		  $db->prepare("SELECT * FROM _event WHERE event_id = ?");
		  $db->exe_prepare("i", $id);
		  if($e = $db->get_next_result("Event")) {
			  while($db->get_next_result("Event"));
			  echo "<h2>Event - {$e->getName()}</h2>";
			  $events = $user->getEvents();
			
			  $trigger = 0;
			  foreach ($events as $key) {
				  if($key->getId() == $id) {
					  $trigger = 1;
				  }
			  }
			
			  if(isset($_GET['del'])) {
				  if($trigger) {
					  $db->prepare("DELETE FROM _user_event WHERE event_id = ? AND user_id = ?;");
					  $db->exe_prepare("ii", $id, $user->getId());
					  $trigger = !$trigger;
				  }
			  } else if(isset($_GET['add'])) {
				  if(!$trigger) {
					  $db->prepare("INSERt INTO _user_event (event_id, user_id) VALUES(?, ?);");
					  $db->exe_prepare("ii", $id, $user->getId());
					  $trigger = !$trigger;
				  }
			  }
			  if($trigger) {
				  echo "<a href='index.php?events=$id&del'>Cancel</a><br>";
			  } else {
				  echo "<a href='index.php?events=$id&add'>Participate</a><br>";
			  }
			
		
			$dif = (strtotime($e->startDate()) - strtotime(date('Y-m-d H:i:s'))) / 3600;
			  echo "<b>Beginn: </b>";
			  if($dif > 60) {
				  echo "{$e->startDate()} in ". (int)$dif . " Stunden";
			  } else if($dif > 0) { 
				  echo "{$e->startDate()} in ". (int)($dif*60) . " Minuten";
			  } else {
				  echo "{$e->startDate()} Das Event hat schon begonnen spute dich. ;)";
			  }
			  echo "<b>Creator: 
</b>{$e->Owner()->getNick()}";
			  echo "<br>";
			  echo "<b>Location: </b>{$e->getLocation()}";
			  echo "<br>";
			  echo "<b>Description: </b>{$e->getDescription()}";
			  echo "<br>";
			  echo "<b>FSK: </b>{$e->getFSK()}";
			  echo "<br>";
			  echo "<br>";
			  echo "<b>Videos:</b><br>";
			
			  /*
			   * mhhh 
			   */
			  if($v = $e->getVideos()) {
				  foreach ($v as $key => $value) {
					  echo $value->getName();
				  }
			  } else {
				  echo "no Videos set";
			  }
>>>>>>> e9f2a68b1078401f14770437872e20a08251cb73
			
			  echo "<br>";
			  echo "<br>";
			  echo "<b>Teilnehmer:</b><br>";
			  if($u = $e->getAllVisitors()) {
				  foreach ($u as $key => $value) {
					  echo "<a href='index.php?profile=".urlencode($value->getNick())."'>".$value->getNick()."</a><br>";
				  }
			  } else {
				  echo "no Users have joined this event";
			  }
		  }
	  } else {
	    ?>
	     <table>
	      <colgroup>
	        <col>
	        <col>
	        <col>
	        <col>
	        <col>
	      </colgroup>
	      <tr>
	        <th>Eventname</th>
	        <th>Location</th>
	        <th>Start date</th>
	        <th>Publisher</th>
	        <th>Count of Visitors</th>
	      </tr>
	    <?php
	    $db->prepare("SELECT * FROM _event;");
		  $db->exe_prepare();
		  while($e = $db->get_next_result()) {
		    
		  }
	  }
	}
?>
