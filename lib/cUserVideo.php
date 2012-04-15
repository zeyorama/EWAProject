<?php

class UserVideo {
		private $uv_id;
		private $user_id;
		private $video_id;
		private $shared_to;
		private $meta;
		

		public function __construct() {
			if(func_num_args() == 1) {
				$tmp = func_get_arg(0);
				if(count($tmp) == 5) {
					$this->uv_id = $tmp[0];
					$this->user_id = $tmp[1];
					$this->video_id = $tmp[2];
					$this->shared_to = $tmp[3];
					$this->meta = $tmp[4];
				}
			}
		}
		
		public function getUvId() {
			return $this->uv_id;
		}
		
		public function getUserId() {
			return $this->user_id;
		}
		
		public function getVideoId() {
			return $this->video_id;
		}
		
		public function getSharedTo() {
			return $this->shared_to;
		}
		
		public function getMeta() {
			return $this->meta;
		}
	}
	
?>