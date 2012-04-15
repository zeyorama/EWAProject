<script type="text/javascript" src="script/profile_drop_down.js"></script>
<?php

	global $user, $db;
	
	if(!function_exists("signed_in")) {
		die("Unavailable Site");
	}
	
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
					  $db->prepare("INSERT INTO _user_event (event_id, user_id) VALUES(?, ?);");
					  $db->exe_prepare("ii", $id, $user->getId());
					  $trigger = !$trigger;
				  }
			  } else if(isset($_GET['delete'])) {
			  	$db->prepare("DELETE FROM _event WHERE event_id = ? AND owner_user_id = ?;");
			  	$db->exe_prepare("ss", $id, $user->getId());
			  	$db->prepare("SELECT * FROM _user_event WHERE event_id = ?");
			  	$db->exe_prepare("s", $id);
			  	$ueIds = array();
			  	while($tmp = $db->get_next_result("UserEvent")) {
			  		$ueIds[] = $tmp->getUeId();
			  	}
			  	foreach($ueIds as $ueId) {
			  		$db->prepare("DELETE FROM _event_video WHERE ue_id = ?");
			  		$db->exe_prepare("s", $ueId);
			  	}
			  	$db->prepare("DELETE FROM _user_event WHERE event_id = ?");
			  	$db->exe_prepare("s", $id);
  				header("Location: index.php?profile={$user->getNick()}");
			  }
			  if($trigger) {
				  echo "<a href='index.php?events=$id&del'>Cancel</a> <a href='index.php?add_video_to_event=$id'>Videos Setzen</a> <br>";
			  } else {
				  echo "<a href='index.php?events=$id&add'>Participate</a><br>";
			  }
			
		
			$dif = (strtotime($e->startDate()) - strtotime(date('Y-m-d H:i:s'))) / 3600;
			  echo "<b>Beginn: </b>";
			  if($dif > 24) {
				  echo "{$e->startDate()} in ". (int)($dif/24) . " Tage";
			  } else if($dif > 1) {
				  echo "{$e->startDate()} in ". (int)$dif . " Stunden";
			  } else if($dif > 0) { 
				  echo "{$e->startDate()} in ". (int)($dif*60) . " Minuten";
			  } else {
				  echo "{$e->startDate()} Das Event hat schon begonnen spute dich. ;)";
			  }
			  echo "<br>";
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
					  echo $value->getTitle()."<br>";
				  }
			  } else {
				  echo "no Videos set";
			  }
			  
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
	        <col align="left">
	        <col align="left">
	        <col align="left">
	        <col align="left">
	        <col align="left">
	        <col align="right">
	      </colgroup>
	      <tr>
	        <th>Eventname</th>
	        <th>Location</th>
	        <th>Start date</th>
	        <th>Publisher</th>
	        <th>Count of Visitors</th>
	        <th></th>
	      </tr>
	    <?php
	    $db->prepare("SELECT * FROM _event;");
		  $db->exe_prepare();
		  $e = array();
		  while($es = $db->get_next_result("Event")) {
		  	$e[] = $es;
		  }
	    foreach($e as $value) {
	    	$sum = count($value->getAllVisitors());
	      echo "<tr>
	        <th><a href=?events={$value->getId()}>{$value->getName()}</a></th>
	        <th>{$value->getLocation()}</th>
	        <th>{$value->startDate()}</th>
	        <th><a href=?profile={$value->Owner()->getNick()} >{$value->Owner()->getNick()}</a></th>
	        <th>$sum</th>
	        <th>"; ?>
	        	<a href="?events=<?php echo $value->getId(); ?>&add">
	        		<img id ='image_cEvents_content<?php echo $value->getId() ?>' alt="" src="images/plus.png" onclick='switch_img("cEvents_content<?php echo $value->getId() ?>");' onmouseover='switch_hover(1, "image_cEvents_content<?php echo $value->getId() ?>");' onmouseout='switch_hover(0, "image_cEvents_content<?php echo $value->getId() ?>");'>
	        	</a>
	        <?php echo "
	        </th>
	      </tr>";
	    }
	    if(count($e) == 0) {
	    	echo "<tr><th>Keine Events gelistet</th></tr>";
	    }
	  }
	}
?>
</table>