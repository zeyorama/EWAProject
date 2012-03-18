<?php
global $db;
$db->query("SELECT * FROM _user WHERE nick='{$_GET['profile']}' LIMIT 1;");
$thisUser = $db->get_next_result('User');
?>
<script type="text/javascript" src="script/profile_drop_down.js"></script>
<div id="profile">

  <h2><?php
    if ($thisUser->getNick() == unserialize($_SESSION['user'])->getNick()) {
      echo 'My';
    } else {
      echo "{$thisUser->getNick()}s";
    }
  ?> profile</h2>
  Bei Stromausfall ist die beste Gelegenheit mit Ihrem Föhn zu baden!
  <hr id="profile"><br>
  <div id="profile_content">
    NAme und der kack
  <br>
  <br>
    <div id='cEvents'>
	    <img id ='image_cEvents_content' alt="" src="" onclick='switch_img("cEvents_content");' onmouseover='switch_hover(1, "image_cEvents_content");' onmouseout='switch_hover(0, "image_cEvents_content");'>
	    Created Events
    	<div id='cEvents_content'>
		    <?php 
		    	$cevents = $thisUser->getCreatedEvents();
		      if ($cevents != NULL) {
		      	if(isset($_GET['cevent'])) {
		      		$site = $_GET['cevent'];
		      	} else {
		      		$site = 0;
		      	}
	      		for($i = $site*10; $i < ($site+1)*10; $i++) {
	      			if(isset($cevents[$i])) {
	      				$f = $cevents[$i];
	      				$id = $f->getID();
	      				$name = $f->getName();
	      				$start = $f->startDate();
	      				echo "<div id='event$id'>$start&nbsp;<a href=index.php?events=".$id.">".$name."</a></div>";
	      			}
	      		}
	      		echo "< ";
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
    	<div id='videos_content'>
		    <?php 
		    	$videos = $thisUser->getVideos();
		      if ($videos != NULL) {
		      	if(isset($_GET['video'])) {
		      		$site = $_GET['video'];
		      	} else {
		      		$site = 0;
		      	}
		      	for($i = $site*10; $i < ($site+1)*10; $i++) {
		      		if(isset($videos[$i])) {
		      			$f = $videos[$i];
		      			$id = $f->getID();
		      			$name = $f->getTitle();
		      			$genre = $f->getGenre()->getGenre();
		      			echo "<div id='event$id'>$genre&nbsp;<a href=index.php?video=".$id.">".$name."</a></div>";
			      	}
		      	}
		      	echo "< ";
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
    	$friends = $thisUser->getFriends();
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
