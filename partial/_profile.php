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
    FRIENDENTRY
    <hr id="profile">
    <b>Events</b><br>
    EVENTENTRY
  </div>
</div>
