<img src="images/dot.png">&nbsp;<a href="<?='index.php' ?>">Home</a>
<?php
  # shows navbar only if user is signed in
  if (!$_SESSION['user'] == NULL) {
?>
<hr id="hr">
<img src="images/dot.png">&nbsp;<a href="index.php?profiles">Profile</a><br>
<img src="images/dot.png">&nbsp;<a href="index.php?messages">Messages</a><br>
<br>
<hr id="hr">
<img src="images/dot.png">&nbsp;<a href="index.php?new_event">New Event</a><br>
<img src="images/dot.png">&nbsp;<a href="index.php?events">Events</a>
<?php
  }
?>
