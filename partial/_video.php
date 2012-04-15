<?php
	global $db, $user;
	
	if (isset($_GET['video'])) {
		if(isset($_GET['edit'])) {
			if(isset($_POST['meta'])) {
				$db->prepare("UPDATE _user_video SET meta=? WHERE user_id = ? AND video_id = ?");
				$db->exe_prepare("sss", $_POST['meta'], $user->getId(), $_GET['video']);
		
				header("Location: index.php?video={$_GET['video']}");
			}
			$db->query("SELECT * FROM _user_video WHERE user_id = {$user->getId()} AND video_id = {$_GET['video']}");
			$user_video = $db->get_next_result("UserVideo");
			echo "<h2>Edit Meta Text For Video</h2>";
			echo "<form action='?video={$_GET['video']}&edit' method='post'>";
			echo "<input type='text' name='meta' value='{$user_video->getMeta()}'>";
			echo "<input type='submit'>";
			echo "</form>";
		} else {
			$id = $_GET['video'];
			
			$db->query("SELECT * FROM _video WHERE _video.video_id = {$id};");
			$vid = null;
			$vid = $db->get_next_result("Video");
			while($db->get_next_result("Video"));
			
			$tit = $vid->getTitle();
			$dur = $vid->getDuration();
			$fsk = $vid->getFSK();
			$genre = $vid->getGenre()->getGenre();
			$year = $vid->getRelease();
			
			echo "<h2>$tit</h2>";
			
			echo "<table>";
			echo "<tr><th width='100px' align='left'>Duration:</th><td align='right'>$dur minutes</td></tr>";
			echo "<tr><th align='left'>FSK:</th><td align='right'>$fsk years</td></tr>";
			echo "<tr><th align='left'>Genre:</th><td align='right'>{$genre}</td></tr>";
			echo "<tr><th align='left'>Release Year:</th><td align='right'>$year</td></tr>";
			
			$vids2 = $user->getVideos();
			$vidids = array();
			foreach ($vids2 as $vid2) {
				$vidids[] = $vid2->getId();
			}
			if(in_array($id, $vidids)) {
				$db->query("SELECT * FROM _user_video WHERE user_id = {$user->getId()} AND video_id = {$vid->getId()}");
				$uv = $db->get_next_result("UserVideo");
				echo "<tr><th align='left'>Meta:</th><td align='right'>{$uv->getMeta()} <a href='?video={$vid->getId()}&edit'>Edit</a></td></tr>";
			}
			echo "</table>";
		}	
	}
?>