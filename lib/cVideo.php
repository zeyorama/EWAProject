<?php
	include_once 'lib/iVideo.php';
	
	/**
	 * @author Markus Benjmain Kretsch
	 */
	final class Video implements i_video {
		
		private $video_id;
		private $title;
		private $duration;
		private $genre_id;
		private $FSK;
		private $release_year;
		
		public function __construct() {
			if(func_num_args() == 1) {
				$tmp = func_get_arg(0);
				if(count($tmp) == 6) {
					$this->video_id = $tmp[0];
					$this->title = $tmp[1];
					$this->duration = $tmp[2];
					$this->genre_id = $tmp[3];
					$this->FSK = $tmp[4];
					$this->release_year = $tmp[5];
				}
			}
		}
		
		/* (non-Javadoc)
		 * @see i_video#getID
		*/
		public function getID() {
			return $this->video_id;
		}
		
		/* (non-Javadoc)
		 * @see i_video#getRelease
		*/
		public function getRelease() {
			return $this->release_year;
		}
		
		/* (non-Javadoc)
		 * @see i_video#getTitle
		*/
		public function getTitle() {
			return $this->title;
		}
		
		/* (non-Javadoc)
		 * @see i_video#getDuration
		*/
		public function getDuration() {
			return $this->duration;
		}
		
		/* (non-Javadoc)
		 * @see i_video#getFsk
		*/
		public function getFSK() {
			return $this->FSK;
		}
		
		/* (non-Javadoc)
		 * @see i_video#getGenre
		*/
		public function getGenre() {
			global $db;
			$db->prepare("SELECT * FROM _genre WHERE genre_id = {$this->genre_id};");
			$db->exe_prepare();
			if($gen = $db->get_next_result("Genre")) {
				while($db->get_next_result("Genre"));
				return $gen;
			} else {
				return NULL;
			}
		}
	
	}
?>