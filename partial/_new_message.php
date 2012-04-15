<?php 
	
	if(!function_exists("signed_in")) {
		die("Unavailable Site");
	}
	
	if(isset($_GET['error'])) {
		echo "Error couldn't send pn";
	}
?>
<form action='new_message.php' method="post">
	<table>
		<tr>
			<td>
				To:
			</td>
			<td>
				<input type="text" name="to"><br>
			</td>
		</tr>
		<tr>
			<td>
				Subject:
			</td>
			<td>
				<input type="text" name="subject"><br>
			</td>
		</tr>
		<tr>
			<td>
				Content:
			</td>
			<td>
				<textarea name="content" style="width:300px; height:150px"></textarea>
			</td>
		</tr>
	</table>
	<input type="submit">
</form>
