<?php	
	include_once 'lib/iGenre.php';	
	
	/**
	 * @author Markus Benjmain Kretsch
	 */
	final class Genre implements i_genre {
		private $genre_id;
		private $name;
		
		/**
		 * Constructor for this class.
		 * @param optional: genre_id to set id, name to set name
		 */
		public function __construct() {
			if(func_num_args() == 1) {
				$tmp = func_get_arg(0);
				if(count($tmp) == 2) {
					$this->genre_id = $tmp[0];
					$this->name = $tmp[1];
				}
			}
		}
		
		/* (non-Javadoc)
		 * @see i_genre#getIndex
		 */
		public function getIndex() {
			return $this->genre_id;
		}
		
		/* (non-Javadoc)
		 * @see i_genre#instance
		 */
		public function getGenre() {
			return $this->name;
		}
		
		/* (non-Javadoc)
		 * @see i_genre#instance
		 */
		public function setGenre($genre) {
			$this->name = $genre;
		}
		
		/* (non-Javadoc)
		 * @see i_genre#instance
		 */
		public function setIndex($index) {
			$this->genre_id = $index;
		}
	}
?>
