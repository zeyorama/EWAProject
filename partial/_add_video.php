<?php 
			global $db, $user;
			
			if(!function_exists("signed_in")) {
				die("Unavailable Site");
			}
			
			if(isset($_POST['mult_vid'])) {
				$select = $_POST['mult_vid'];
				foreach ($select as $val) {
					$db->prepare("INSERT INTO _user_video (user_id, video_id) VALUES(?, ?);");
					$db->exe_prepare("ss", $user->getId(), $val);
				}
		  	header("Location: index.php?profile={$user->getNick()}");
			
			} else {
?>

				<h2>Add Video</h2>
				
				<form action="?add_video" method="post">
				
					<select multiple="multiple" style="width: 400px; height:250px;" name="mult_vid[]">
						<?php 
							
							$vids = $user->getVideos();
							
							$db->query("SELECT * FROM _video;");
							
							while($vid = $db->get_next_result("Video")) {
								if(!in_array($vid, $vids)) {
									echo "<option value={$vid->getId()}>{$vid->getTitle()}</option>";
								}
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