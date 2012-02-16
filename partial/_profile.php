<?php
global $db;
$db->query("SELECT * FROM _user WHERE nick='{$_GET['profile']}' LIMIT 1;");
$thisUser = $db->get_next_result('User');
?>
<div id="profile">

  <h2><?php
    if ($thisUser->getNick() == unserialize($_SESSION['user'])->getNick()) {
      echo 'My';
    } else {
      echo "{$thisUser->getNick()}s";
    }
  ?> profile</h2>
  Bei Stromausfall ist die beste Gelegenheit mit Ihrem Föhn zu baden!
  <hr id="profile"><br>
  <div id="profile_content">
    NAme und der kack<br><br><br>Videos:
    <?php 
    	$videos = $thisUser->getVideos();
      if ($videos != NULL) {
	    	foreach($videos as $f) {
	    		$id = $f->getID();
	    		$title = $f->getTitle();
	    		echo "<div id='video$id'><a href=index.php?video=".$id.">".$title."</a></div>";
	    	}
      } else {
      	echo "No Videos";
      }
    ?>
  </div>
  <div id="profile_infos">
    <b>Friends</b><br>
    <?php 
    	$friends = $thisUser->getFriends();
      if ($friends != NULL) {
	    	foreach($friends as $f) {
	    		$nick = $f->getNick();
	    		echo "<a href=index.php?profile=".urlencode($nick).">{$nick}</a><br>";
	    	}
      } else {
      	echo "No Friends 8'(";
      }
    ?>
    <hr id="profile">
    <b>Events</b><br>
    <?php
      $events = $thisUser->getEvents();
      if ($events != NULL) {
        foreach ($events as $e) {
          $event = $e->getName();
          $id = $e->getId();
          echo "<a href='index.php?event=$id'>{$event}</a><br>";
        }
      } else {
        echo "No events";
      }
    ?>
  </div>
</div>
