<?php
	include_once 'lib/iUser.php';

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
			if(func_num_args() == 9) {
				$this->user_id = func_get_arg(0);
				$this->nick = func_get_arg(1);
				$this->email = func_get_arg(2);
				$this->pass = func_get_arg(3);
				$this->admin = func_get_arg(4);
				$this->created_at = func_get_arg(5);
				$this->last_signin = func_get_arg(6);
				$this->session_id = func_get_arg(7);
				$this->locked = func_get_arg(8);
			}
		}
		
		/* (non-Javadoc)
		 * @see i_user#getVideos
		*/
		public function getVideos() {
			
		}
		
		/* (non-Javadoc)
		 * @see i_user#getEvents
		*/
		public function getEvents() {
			
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
		 * @see i_user#updateDB
		*/
		function updateDB() {
			$db = $GLOBALS['db'];
			$db->prepare("UPDATE _user SET 
					nick = ?, 
					email = ?, 
					pass = ?, 
					admin = ?, 
					last_signin = ?, 
					session_id = ?, 
					locked = ? 
				WHERE user_id = ? LIMIT 1;");
			$db->exe_prepare("sssdssds", 
					$this->nick, 
					$this->email, 
					$this->pass, 
					$this->admin, 
					$this->last_signin, 
					$this->session_id, 
					$this->locked, 
					$this->user_id
				);
			var_dump($this);
			echo "<br>";
			echo "<br>";
		}
	}
?>