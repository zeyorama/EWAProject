<?php
global $db;
$db->query("SELECT * FROM _user WHERE nick='{$_GET['profile']}' LIMIT 1;");
$thisUser = $db->get_next_result('User');

$nick = unserialize($_SESSION['user'])->getNick();
$id = unserialize($_SESSION['user'])->getId();

if(isset($_GET['vid'])) {
	$video = $_GET['vid'];
	$db->prepare("DELETE FROM _user_video WHERE user_id = ? AND video_id = ?;");
	$db->exe_prepare("ss", $id, $video);
}

if(isset($_GET['event'])) {
	$video = $_GET['event'];
	$db->prepare("DELETE FROM _event_video WHERE ue_id = ? AND video_id = ?;");
	$db->exe_prepare("ss", $id, $video);
}

if(isset($_GET['connect'])) {
	if(signed_in()) {
		$db->prepare("INSERT INTO _knowing (user_id1, user_id2) VALUES(?, ?);");
		$db->exe_prepare("ss", $id, $thisUser->getId());
	}
}

if(isset($_GET['unconnect'])) {
	if(signed_in()) {
		$db->prepare("DELETE FROM _knowing WHERE user_id1 = ? AND user_id2 = ?;");
		$db->exe_prepare("ss", $id, $thisUser->getId());
		$db->prepare("DELETE FROM _knowing WHERE user_id1 = ? AND user_id2 = ?;");
		$db->exe_prepare("ss", $thisUser->getId(), $id);
	}
}

?>
<script type="text/javascript" src="script/profile_drop_down.js"></script>
<div id="profile">

  <h2><?php
    if ($thisUser->getNick() == $nick) {
      echo 'My';
    } else {
      echo "{$thisUser->getNick()}s";
    }
    $friends = $thisUser->getFriends();
  ?> profile</h2>
  <b><?php echo "Gürtel: ".$thisUser->getBelt(); ?></b><br><br>
  <?php 
  
  	$toggle = 0;
  	
  	if($friends != NULL) {
	  	foreach($friends as $value) {
	  		if($id == $value->getId()) {
	  			$toggle = 1;
	  		}
	  	}
  	}
  	
  	if($thisUser->getId() == $id) {
  		$toggle = 1;
  	}
  
  	if($toggle == 1) {
  		if(($thisUser->getId() != $id)) {
  			echo "<a href='?profile={$thisUser->getNick()}&unconnect={$thisUser->getId()}'>Unconnect</a><br>";
  		}
  ?>
  Bei Stromausfall ist die beste Gelegenheit mit Ihrem Föhn zu baden!
  <hr id="profile"><br>
  <div id="profile_content">
    NAme und der kack
  <br>
  <br>
    <div id='cEvents'>
	    <img id ='image_cEvents_content' alt="" src="" onclick='switch_img("cEvents_content");' onmouseover='switch_hover(1, "image_cEvents_content");' onmouseout='switch_hover(0, "image_cEvents_content");'>
	    Created Events
	    <?php 
	    	if($thisUser->getNick() == unserialize($_SESSION['user'])->getNick()) {
	    		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='?new_event'>Add Event</a>";
	    	}
    	?>
    	<div id='cEvents_content'>
		    <?php 
		    	$cevents = $thisUser->getCreatedEvents();
		      if ($cevents != NULL) {
		      	if(isset($_GET['cevent'])) {
		      		$site = $_GET['cevent'];
		      	} else {
		      		$site = 0;
		      	}
		      	echo "<table width='500px'>";
	      		for($i = $site*10; $i < ($site+1)*10; $i++) {
	      			if(isset($cevents[$i])) {
	      				$f = $cevents[$i];
	      				$id = $f->getID();
	      				$name = $f->getName();
	      				$start = $f->startDate();
	      				echo "<tr id='event$id'><td>$start</td><td><a href=index.php?events=".$id.">".$name."</a></td>";
	      				
	      				if($thisUser->getNick() == unserialize($_SESSION['user'])->getNick()) {
	      				?> 
								
								<td>
								<a href="?delete&events=<?php echo $id;?>"><img src='images/minus.png' id='del<?php echo "$id" ?>' onmouseover='switch_hover(1, "del<?php echo "$id" ?>");' onmouseout='switch_hover(0, "del<?php echo "$id" ?>");'> </a> 
								</td>
								
								<td>
								<a href="?edit_event=<?php echo $id;?>"><img src='images/edit.png' id='edit<?php echo "$id" ?>' onmouseover='switch_hover_edit(1, "edit<?php echo "$id" ?>");' onmouseout='switch_hover_edit(0, "edit<?php echo "$id" ?>");'> </a> 
								</td>
								
								<?php
	      				}
	      				echo "</tr>";
	      			}
	      		}
	      		echo "</table>< ";
	      		for($i = 0; $i < count($cevents) / 10; $i++) {
	      			if($i == $site) {
	      				echo "<font color='red'>$i</font>";
	      			} else {
	      				echo "<a href='?profile={$thisUser->getNick()}&cevent={$i}'>$i</a> ";
	      			}
	      		}
	      		echo " >";
		      } else {
		      	echo "No Created Events";
		      }
		    ?>
    	</div>
    </div>
    <br>
    <div id='videos'>
	    <img id ='image_videos_content' alt="" src="" onclick='switch_img("videos_content");' onmouseover='switch_hover(1, "image_videos_content");' onmouseout='switch_hover(0, "image_videos_content");'>
	    Videos
    	<?php
	    	if($thisUser->getNick() == unserialize($_SESSION['user'])->getNick()) {
	    		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='?add_video'>Add Video</a>";
	    	}
	    ?>
    	<div id='videos_content'>
		    <?php 
		    	$videos = $thisUser->getVideos();
		      if ($videos != NULL) {
		      	if(isset($_GET['video'])) {
		      		$site = $_GET['video'];
		      	} else {
		      		$site = 0;
		      	}
		      	echo "<table width='500px'>";
		      	for($i = $site*10; $i < ($site+1)*10; $i++) {
		      		if(isset($videos[$i])) {
		      			$f = $videos[$i];
		      			$id = $f->getID();
		      			$name = $f->getTitle();
		      			$genre = $f->getGenre()->getGenre();
		      			echo "<tr id='event$id'><td>$genre</td><td><a href=index.php?video=".$id.">".$name."</a></td><td>";
		      			?> <a href="?profile=<?php echo $thisUser->getNick(); ?>&vid=<?php echo $id;?>"> <img src='images/minus.png' id='del2<?php echo "$id" ?>' onmouseover='switch_hover(1, "del2<?php echo "$id" ?>");' onmouseout='switch_hover(0, "del2<?php echo "$id" ?>");'></a> <?php
		      			$db->query("SELECT * FROM _user_video WHERE video_id = $id AND user_id = {$thisUser->getId()};");
		      			$uv = $db->get_next_result("UserVideo");
		      			$sId = $uv->getSharedTo();
		      			if($sId) {
		      				$db->query("SELECT * FROM _user WHERE user_id = $sId;");
		      				$sharedUser = $db->get_next_result("User");
		      				echo "<a href='?profile={$sharedUser->getNick()}'>{$sharedUser->getNick()}</a>&nbsp;&nbsp;<a href='?share&to_unlock=$id'>U</a>";
		      			} else {
		      			echo "<a href='?share&to_share=$id'>Share</a>";
		      			}
		      			echo "</td></tr>";
			      	}
		      	}
		      	echo "</table>< ";
		      	for($i = 0; $i < count($videos) / 10; $i++) {
		      		if($i == $site) {
		      			echo "<font color='red'>$i</font>";
		      		} else {
			      		echo "<a href='?profile={$thisUser->getNick()}&video={$i}'>$i</a> ";
			      	}
		      	}
		      	echo " >";
		      } else {
		      	echo "No Videos";
		      }
		      ?>
	    </div>
    </div>
  </div>
  <div id="profile_infos">
    <b>Friends</b><br>
    <?php 
      if ($friends != NULL) {
	    	foreach($friends as $f) {
	    		$nick = $f->getNick();
	    		echo "<a href=index.php?profile=".urlencode($nick).">{$nick}</a><br>";
	    	}
      } else {
      	echo "No Friends 8'(";
      }
    ?>
    <hr id="profile">
    <b>Events</b><br>
    <?php
      $events = $thisUser->getEvents();
      if ($events != NULL) {
        foreach ($events as $e) {
          $event = $e->getName();
          $id = $e->getId();
          echo "<a href='index.php?events=$id'>{$event}</a><br>";
        }
      } else {
        echo "No events";
      }
    ?>
  </div>
</div>

<?php 
  	} else {
  		echo "<a href='?profile={$thisUser->getNick()}&connect={$thisUser->getId()}'>connect</a><br>";
  		echo "Not Available";  		
  	}
?>
	
		<!-- 
 			The divs for created_events and videos first invisible , if javascript is activated
   		Also the image src will be set for the plus and the minus
		-->
    <script type="text/javascript">
    	<?php if(!isset($_GET['cevent'])) { ?>
	  		document.getElementById("cEvents_content").style.display = 'none';
				document.getElementById("image_cEvents_content").src = "images/plus.png";
			<?php } else { ?>				
	  		document.getElementById("cEvents_content").style.display = 'block';
				document.getElementById("image_cEvents_content").src = "images/minus.png";
			<?php } ?>

    	<?php if(!isset($_GET['video'])) { ?>
	  		document.getElementById("videos_content").style.display = 'none';
				document.getElementById("image_videos_content").src = "images/plus.png";
			<?php } else { ?>				
	  		document.getElementById("videos_content").style.display = 'block';
				document.getElementById("image_videos_content").src = "images/minus.png";
			<?php } ?>
			
    </script>
