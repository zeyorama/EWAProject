<?php
global $db, $user;

if(isset($_GET['to_unlock'])) {
	$un = $_GET['to_unlock'];
	$db->query("UPDATE _user_video SET shared_to = NULL WHERE user_id = {$user->getId()} AND video_id = $un;");
	
  header("Location: index.php?profile={$user->getNick()}&video");
} else if(isset($_GET['to_share'])) {
	$id = $_GET['to_share'];
	
	$db->query("SELECT * FROM _video WHERE video_id = $id");
	$vid = $db->get_next_result("Video");
	while($db->get_next_result("Video"));
	echo "<h2>Share {$vid->getTitle()} to</h2>";
	
	echo "<form action='?share' method='post'>";
	
	echo "<select name='user'>";
		
	$users = $user->getFriends();
	foreach($users as $user) {
		echo "<option value={$user->getId()}>{$user->getNick()}</option>";
	}
	
		
	echo "</select>";
	echo "<input type=hidden name='vid_id' value='$id'>";
	echo "<br><br><input type='submit'></form>";

} else if(isset($_POST['user'])) {
	$userId = $_POST['user'];
	$db->query("UPDATE _user_video SET shared_to = $userId WHERE user_id = {$user->getId()} AND video_id = {$_POST['vid_id']}");
	header("Location: index.php?profile={$user->getNick()}&video");
}

?>