<script type="text/javascript" src="script/profile_drop_down.js"></script>
<?php
	global $db, $user;
	
	if(!function_exists("signed_in")) {
		die("Unavailable Site");
	}
	
	if (isset($_GET['show'])) {
		$db->prepare("SELECT * FROM _pn WHERE pn_id = ? AND to_user = ?;");
		$db->exe_prepare("ii", $_GET['show'], $user->getId());
		if($pn = $db->get_next_result("Message")) {
			while($db->get_next_result("Message"));
			$fuser = $pn->getFromUser();
			$tuser = $pn->getToUser();
			echo "
				<div>
					<div>
						<b>Von:</b><br>
						<a href='index.php?profile={$fuser->getNick()}'>
							{$fuser->getNick()}
						</a>
					</div>
					<br>
					<div>
						<b>An:</b><br>
						<a href='index.php?profile={$tuser->getNick()}'>
							{$tuser->getNick()}
						</a>
					</div>
					<br>
					<div>
						<b>Subject:</b><br>{$pn->getSubject()}
					</div>
					<br>
					<div>
						<b>Content:</b><br>{$pn->getContent()}
					</div>
				</div>
			";
		} else {
			while($db->get_next_result("Message"));
			echo "Cannot Show Message";
		}
	} else if(isset($_GET['delete'])) {
		$db->prepare("DELETE FROM _pn WHERE pn_id = ?;");
		$db->exe_prepare("i", $_GET['delete']);
  	header("Location: index.php?messages");
	} else {
		$db->query("SELECT * FROM _pn WHERE to_user = {$user->getId()};");
		echo "<table>
					  <colgroup>
					    <col width='150px'>
					    <col width='130px'>
					    <col width='130px'>
					    <col width='300px'>
					  </colgroup>
					  <tr>
					    <th align='left'>Datetime</th>
					    <th align='left'>From</th>
					    <th align='left'>To</th>
					    <th align='left'>Subject</th>
					  </tr>";
		$u2 = array();
		while($tmp = $db->get_next_result("Message")) {
			$u2[] = $tmp;
		}
		if(count($u2) == 0) {
			echo "<tr><td>No Messages</td></tr>\n</table>";
		} else {
			
			$site = $_GET['messages'];
			
			
			for($i = $site*10; $i < ($site+1)*10; $i++) {
				if(isset($u2[$i])) {
					$u = $u2[$i];
					$date = $u->getSendDate();
					$from = $u->getFromUser();
					$to = $u->getToUser();
					$subject = $u->getSubject();
					echo "<tr>
									<td>
										$date
									</td>
									<td>
										<a href='index.php?profile={$from->getNick()}'>
											{$from->getNick()}
										</a>
									</td>
									<td>
										<a href='index.php?profile={$to->getNick()}'>
											{$to->getNick()}
										</a>
									</td>
									<td>
										<a href='index.php?messages&show={$u->getId()}'>
											$subject
										</a>
									</td>
									<td>
										<a href='index.php?messages&delete={$u->getId()}'>"?>
											<img src='images/minus.png' id='del' onmouseover='switch_hover(1, "del");' onmouseout='switch_hover(0, "del");'>
										<?php echo "</a>
									</td>
									</tr>";
					}
			}
			echo "</table>";
			echo "< ";
			for($i = 0; $i < count($u2) / 10; $i++) {
				if($i == $site) {
					echo "<font color='red'>$i</font>";
				} else {
					echo "<a href='?messages={$i}'>$i</a> ";
				}
			}
			echo " >";
		}
	}
	
?>
