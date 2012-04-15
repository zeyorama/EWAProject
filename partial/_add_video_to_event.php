<?php 
	global $db, $user;
	
	if(isset($_GET['add_video_to_event'])) {
		$db->prepare("SELECT * FROM _event WHERE event_id = ?;");
		$db->exe_prepare("s", $_GET['add_video_to_event']);
		$event = $db->get_next_result("Event");
		while($db->get_next_result("Event"));
		
		$db->prepare("SELECT * FROM _user_event WHERE user_id = ? AND event_id = ?");
		$db->exe_prepare("ss", $user->getId(), $event->getId());
		$ueid = $db->get_next_result("UserEvent");
		while($db->get_next_result("UserEvent"));
	}

			
	if(isset($_POST['mult_vid'])) {
		$select = $_POST['mult_vid'];
		foreach ($select as $val) {
			$db->query("DELETE FROM _event_video WHERE ue_id = {$ueid->getUeId()}");
			$db->prepare("INSERT INTO _event_video (ue_id, video_id) VALUES(?, ?);");
			$db->exe_prepare("ss", $ueid->getUeId(), $val);
		}
  	header("Location: index.php?profile={$user->getNick()}");
	} else {
?>

				<h2>
					Videos Setzen zu Event(<?php echo $event->getName(); ?>)
				</h2>

				
				<form action="?add_video_to_event=<?php echo $_GET['add_video_to_event'] ?>" method="post">
				
					<select multiple="multiple" style="width: 400px; height:250px;" name="mult_vid[]">
						<?php 
							$vids = $user->getVideos();
							foreach($vids as $vid) {
								echo "<option value={$vid->getId()}>{$vid->getTitle()}</option>";
							}
							
						?>
					</select>
					<br>
					<br>
					<input type="submit">
				
				</form>

<?php 
			}
?>