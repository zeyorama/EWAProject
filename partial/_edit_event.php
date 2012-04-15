<div id="new_event">

<?php 
	global $db, $user;
	$db->query("SELECT * FROM _event WHERE event_id = {$_GET['edit_event']} AND owner_user_id = {$user->getId()}");
	$event = $db->get_next_result("Event");
?>

<form action="edit_event.php" method="POST">
<p>
  Name:<br>
  <input name="name" value="<?php echo $event->getName(); ?>"><br>
</p>
<p>
  Location:<br>
  <input name="location" value="<?php echo $event->getLocation(); ?>"><br>
</p>
<p>
  When will be the event begin?<br>
  <input name="start" value="<?php echo $event->startDate(); ?>">&nbsp;&lt;Formate: yyyy-mm-dd hh:mm:ss&gt;<br>
</p>
<p>
  Insert the event description here:<br>
  <textarea name="description" style="width:250px;"><?php echo $event->getDescription(); ?></textarea><br>
</p>
<p>
  <input type="hidden" value="<?php echo $_GET['edit_event']; ?>" name="id">
  <input type="submit" value="Create"><br>
</p>
</form>

</div>
