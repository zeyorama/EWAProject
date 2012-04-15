<?php

class UserEvent {
		private $ue_id;
		private $user_id;
		private $event_id;
		

		public function __construct() {
			if(func_num_args() == 1) {
				$tmp = func_get_arg(0);
				if(count($tmp) == 3) {
					$this->ue_id = $tmp[0];
					$this->user_id = $tmp[1];
					$this->event_id = $tmp[2];
				}
			}
		}
		
		public function getUeId() {
			return $this->ue_id;
		}
		
		public function getUserId() {
			return $this->user_id;
		}
		
		public function getEventId() {
			return $this->event_id;
		}
	}
	
?>