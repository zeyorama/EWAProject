<?php
	include_once 'lib/iUser.php';
	
	/**
	 * @author Markus Benjmain Kretsch
	 */
	final class User implements i_user {
		
		private $user_id;
		private $nick;
		private $email;
		private $pass;
		private $admin;
		private $created_at;
		private $last_signin;
		private $session_id;
		private $locked;
		
		public function __construct() {
			if(func_num_args() == 1) {
				$tmp = func_get_arg(0);
				if(count($tmp) == 9) {
					$this->user_id = $tmp[0];
					$this->nick = $tmp[1];
					$this->email = $tmp[2];
					$this->pass = $tmp[3];
					$this->admin = $tmp[4];
					$this->created_at = $tmp[5];
					$this->last_signin = $tmp[6];
					$this->session_id = $tmp[7];
					$this->locked = $tmp[8];
				}
			}
		}
		
		/* (non-Javadoc)
		 * @see i_user#getVideos
		*/
		public function getVideos() {
			global $db;
			$db->query("SELECT * FROM _video WHERE _video.video_id IN(
					SELECT _user_video.video_id FROM _user_video WHERE _user_video.user_id = {$this->user_id}
			);");
			$videos = array();
			while($vid = $db->get_next_result("Video")) {
				$videos[] = $vid;
			}
			return $videos;
		}
		
		/* (non-Javadoc)
		 * @see i_user#getFriends
		*/
		public function getFriends() {
			global $db;
			$db->prepare("SELECT * FROM _user WHERE user_id IN (
					SELECT user_id2 FROM _knowing WHERE user_id1 = {$this->user_id} AND user_id2 != user_id1
				);");
			$db->exe_prepare();
			$friends = array();
			while($asd = $db->get_next_result("User")) {
				$friends[] = $asd;
			}
			$db->prepare("SELECT * FROM _user WHERE user_id IN (
					SELECT user_id1 FROM _knowing WHERE user_id2 = {$this->user_id} AND user_id2 != user_id1
				);");
			$db->exe_prepare();
			while($asd = $db->get_next_result("User")) {
				$friends[] = $asd;
			}
			return $friends;
		}
		
		
		/* (non-Javadoc)
		 * @see i_user#getEvents
		*/
		public function getEvents() {
			global $db;
			$db->query("SELECT * FROM _event WHERE _event.event_id IN (
					SELECT _user_event.event_id FROM _user_event WHERE _user_event.user_id = {$this->user_id}
				)");
			$events = array();
			while($ev = $db->get_next_result("Event")) {
				$events[] = $ev;
			}
			
			return $events;
		}
		
		/* (non-Javadoc)
		 * @see i_user#getCreatedEvents
		*/
		public function getCreatedEvents() {
			global $db;
			$db->query("SELECT * FROM _event WHERE _event.owner_user_id = {$this->user_id} ORDER BY startDate;");
					$events = array();
					while($ev = $db->get_next_result("Event")) {
					$events[] = $ev;
			}
			
			return $events;
		}
		
		/* (non-Javadoc)
		 * @see i_user#isAdmin
		*/
		public function isAdmin() {
			return $this->admin;
		}
		
		
		/* (non-Javadoc)
		 * @see i_user#getBelt
		*/
		public function getBelt() {
			
		}
		
		
		/* (non-Javadoc)
		 * @see i_user#lastSignIn
		*/
		public function lastSignIn() {
			return $this->last_signin;
		}
		
		
		/* (non-Javadoc)
		 * @see i_user#setlastSignIn
		*/
		public function setlastSignIn($time) {
			$this->last_signin = $time;
			$this->updateDB();
		}
		
		
		/* (non-Javadoc)
		 * @see i_user#setSessionId
		*/
		public function setSessionId($session_id) {
			$this->session_id = $session_id;
			$this->updateDB();
		}
		
		/* (non-Javadoc)
		 * @see i_user#getSessionId
		*/
		public function getSessionId() {
			return $this->last_signin;
		}
		
		
		/* (non-Javadoc)
		 * @see i_user#registeredAt
		*/
		public function registeredAt() {
			return $this->created_at;
		}
		
		
		/* (non-Javadoc)
		 * @see i_user#getNick
		*/
		public function getNick() {
			return $this->nick;
		}
		
		
		/* (non-Javadoc)
		 * @see i_user#getMail
		*/
		public function getMail() {
			return $this->email;
		}
		
		/* (non-Javadoc)
		 * @see i_user#getId
		*/
		public function getId() {
			return $this->user_id;
		}
		
		/* (non-Javadoc)
		 * @see i_user#isLocked
		*/
		public function isLocked() {
			return $this->locked;
		}
		
		/* (non-Javadoc)
		 * @see i_user#getPass
		*/
		public function getPass() {
			return $this->pass;
		}
		
		/* (non-Javadoc)
		 * @see i_user#updateDB
		*/
		public function updateDB() {
			global $db;
			$db->query("UPDATE _user SET 
					nick = '{$this->nick}', 
					email = '{$this->email}', 
					pass = '{$this->pass}', 
					admin = {$this->admin}, 
					last_signin = '{$this->last_signin}', 
					session_id = '{$this->session_id}', 
					locked = {$this->locked} 
				WHERE user_id = {$this->user_id};");
		}
	}
?>
