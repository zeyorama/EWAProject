<img src="images/dot.png">&nbsp;<a href="index.php">Home</a>
<?php
  # shows navbar only if user is signed in
  if (!$_SESSION['user'] == NULL) {
?>
<hr id="hr">
<div id='m_profiles'><img src="images/dot.png">&nbsp;<a href="index.php?profiles">Profile</a></div>
<div id='m_messages'><img src="images/dot.png">&nbsp;<a href="index.php?messages">Messages</a></div>

<?php 
	if(isset($_GET['messages']) || isset($_GET['new_message'])) {
?>
<div id='m_sub_messages'>
	<ul>
	  <li><a href='index.php?new_message'>New Message</a></li>
	  <li><a href='index.php?messages&sended'>Sended Messages</a></li>
	</ul>
</div>

<?php 
	}
?>

<hr id="hr">
<div id='m_new_event'><img src="images/dot.png">&nbsp;<a href="index.php?new_event">New Event</a></div>
<div id='m_events'><img src="images/dot.png">&nbsp;<a href="index.php?events">Events</a></div>
<?php
  }
?>
