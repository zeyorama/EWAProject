<?php

include 'iEvent.php';

/**
 * @author Frank Kevin Zey
 */
class Event implements i_event {

  private $event_id;
  private $startDate;
  private $location;
  private $description;
	private $owner_user_id;
  private $locked;
  private $FSK;
  private $name;
  
  /**
   * Constructor for Event.
   */
  public function __construct() {
    if(func_num_args() == 1) {
			$tmp = func_get_arg(0);
			if(count($tmp) == 8) {
				$this->event_id = $tmp[0];
				$this->startDate = $tmp[1];
				$this->location = $tmp[2];
				$this->description = $tmp[3];
				$this->owner_user_id = $tmp[4];
				$this->locked = $tmp[5];
				$this->FSK = $tmp[6];
				$this->name = $tmp[7];
			}
		}
  }
  
	/* (non-Javadoc)
	 * @see i_event#setFKS
	 */
	public function setFSK() {
	  $this->FSK = 0;
	  $videos = $this->getVideos();
	  
	  if ($videos == NULL) { return; }
	  
	  foreach ($videos as $v) {
	    $vFSK = $v->getFSK();
	    if ($vFSK >= 18) {
	      $this->FSK = $vFSK;
	      return;
	    }
	    if ($vFSK > $this->FSK) {
	      $this->FSK = $vFSK;
	    }
	  }
	}
	
	/* (non-Javadoc)
	 * @see i_event#getFSK
	*/
	public function getFSK() {
		return $this->FSK;
	}
	
	/* (non-Javadoc)
	 * @see i_event#getVideos
	 */
	public function getVideos(){
	  $videos = Array();
	  
	  global $db;
	  $db->query("SELECT * FROM _video WHERE _video.video_id IN (
	  		SELECT _event_video.video_id FROM _event_video WHERE ue_id = {$this->event_id}
	  );");
	  
	  while($video = $db->get_next_result("Video")) {
	  	$videos[] = $video;
	  }
	  
	  if (!count($videos)) { return NULL; }
	  return $videos;
	}
	
	/* (non-Javadoc)
	 * @see i_event#startDate
	 */
	public function startDate() {
	  return $this->startDate;
	}
	
	/* (non-Javadoc)
	 * @see i_event#getLocation
	 */ 
	public function getLocation() {
	  return $this->location;
	}
	
	/* (non-Javadoc)
	 * @see i_event#Owner
	 */
	public function Owner() {
	  global $db;
	  $db->query("SELECT * FROM _user WHERE user_id = {$this->owner_user_id};");
	  return $db->get_next_result("User");
	}
	
	/* (non-Javadoc)
	 * @see i_event#getAllVisitors
	 */
	public function getAllVisitors() {
	  $visitors = Array();
	  
	  global $db;
	  $db->query("SELECT * FROM _user WHERE _user.user_id IN (SELECT user_id FROM _user_event WHERE event_id = {$this->event_id});");
	  
	  while($user = $db->get_next_result("User")) {
	  	$visitors[] = $user;
	  }
	  
	  if (!count($visitors)) { return NULL; }
	  return $visitors;
	}
	
	/* (non-Javadoc)
	 * @see i_event#getId
	 */
	public function getId() {
	  return $this->event_id;
	}
	
	/* (non-Javadoc)
	 * @see i_event#getName
	 */
	public function getName() {
	 return $this->name; 
	}
	
	
	/* (non-Javadoc)
	 * @see i_event#getDescription
	*/
	public function getDescription() {
		return $this->description;
	}
}

?>
