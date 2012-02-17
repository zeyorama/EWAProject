<?php

	include_once 'lib/iMessage.php';
	
	class Message implements i_mess {
		
		private $pn_id;
		private $subject;
		private $content;
		private $sendDate;
		private $from_user;
		private $to_user;
		
		public function __construct() {
			if(func_num_args() == 1) {
				$tmp = func_get_arg(0);
				if(count($tmp) == 6) {
					$this->pn_id = $tmp[0];
					$this->subject = $tmp[1];
					$this->content = $tmp[2];
					$this->sendDate = $tmp[3];
					$this->from_user = $tmp[4];
					$this->to_user = $tmp[5];
				}
			}
		}
		
		
		/* (non-Javadoc)
		 * @see i_mess#getId
		 */
		public function getId() {
			return $this->pn_id;
		}
		
		
		
		/* (non-Javadoc)
		 * @see i_mess#getSubject
		 */
		public function getSubject() {
			return $this->subject;
		}
		
		
		
		/* (non-Javadoc)
		 * @see i_mess#getContent
		 */
		public function getContent() {
			return $this->content;
		}
		
		
		
		/* (non-Javadoc)
		 * @see i_mess#getSendDate
		 */
		public function getSendDate() {
			return $this->sendDate;
		}
		
		
		
		/* (non-Javadoc)
		 * @see i_mess#getFromUser
		 */
		public function getFromUser() {
			global $db;
			$db->query("SELECT * FROM _user WHERE user_id = {$this->from_user}");
			return $db->get_next_result("User");
		}
		
		
		
		/* (non-Javadoc)
		 * @see i_mess#getToUser
		 */
		public function getToUser() {
			global $db;
			$db->query("SELECT * FROM _user WHERE user_id = {$this->to_user}");
			return $db->get_next_result("User");
		}
		
	}

?>