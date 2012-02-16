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
    NAme und der kack<br><br><br>sonstiger mist
  </div>
  <div id="profile_infos">
    <b>Friends</b><br>
    <?php 
    	$friends = $thisUser->getFriends();
    	foreach($friends as $f) {
    		$nick = $f->getNick();
    		echo "<a href=index.php?profile=".urlencode($nick).">{$nick}</a>";
    	}
    ?>
    <hr id="profile">
    <b>Events</b><br>
    <?php
      $events = $thisUser->getEvents();
      foreach ($events as $e) {
        $event = $e->getName();
        echo "<a href='index.php?event='".urlencode($event).">{$event}</a>";
      }
    ?>
  </div>
</div>
