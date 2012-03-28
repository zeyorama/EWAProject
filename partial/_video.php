<?php
	global $db, $user;
	
	if (isset($_GET['video'])) {
		$db->prepare("SELECT * FROM _video WHERE video_id = ?;");
		$db->exe_prepare("i", $_GET['video']);
		if($vid = $db->get_next_result("Video")) {
			while($db->get_next_result("Video"));
			$tit = $vid->getTitle();
			$dur = $vid->getDuration();
			$fsk = $vid->getFSK();
			$genre = $vid->getGenre();
			$year = $vid->getRelease();
			
			echo "<h2>$tit</h2>";
			
			echo "<table>";
			echo "<tr><th width='100px' align='left'>Duration:</th><td align='right'>$dur minutes</td></tr>";
			echo "<tr><th align='left'>FSK:</th><td align='right'>$fsk years</td></tr>";
			echo "<tr><th align='left'>Genre:</th><td align='right'>{$genre->getGenre()}</td></tr>";
			echo "<tr><th align='left'>Release Year:</th><td align='right'>$year</td></tr>";
			echo "</table>";
		}
	}
?>