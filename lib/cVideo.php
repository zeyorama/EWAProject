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
			$db->prepare("SELECT * FROM _genre WHERE genre_id = {$this->genre_id}");
			if($gen = $db->get_netxt_result("Genre")) {
				return $gen;
			} else {
				return NULL;
			}
		}
	
	}
?>