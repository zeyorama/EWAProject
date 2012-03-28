<?php 
			global $db, $user;
			
			if(isset($_POST['mult_vid'])) {
				$select = $_POST['mult_vid'];
				var_dump($select);
				foreach ($select as $val) {
					echo "$val asd";
				}
			} else {
?>

<h2>Add Video</h2>

<form action="?add_video" method="post">

	<select multiple="multiple" style="width: 400px; height:250px;" name="mult_vid[]">
		<?php 
			
			$db->query("SELECT * FROM _video;");
			
			while($vid = $db->get_next_result("Video")) {
				echo "<option>{$vid->getTitle()}</option>";
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