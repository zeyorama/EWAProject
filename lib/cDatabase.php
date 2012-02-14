<?php

	include_once 'iDatabase.php';
	include_once 'lib/cGenre.php';
	
	final class Database implements i_db {
		private static $instance = NULL;
		
		private $connection = NULL;
		private $prep = NULL;
		private $result = NULL;
		
		private function __construct() {}
		
		/* (non-Javadoc)
		 * @see i_db#instance
		*/
		public static function instance() {
			if(self::$instance === NULL) {
				self::$instance = new self;
			}
			return self::$instance;
		}
		
		/* (non-Javadoc)
		 * @see i_db#connect
		 */
		public function connect($user, $pass, $schema) {
			$this->connection = new mysqli('localhost', $user, $pass, $schema);
		}
		
		
		/* (non-Javadoc)
		 * @see i_db#close
		 */
		public function close() {
			$this->connection->close();
		}
		
		
		/* (non-Javadoc)
		 * @see i_db#query
		 */
		public function query($query, $type) {
			$this->result = $this->connection->query($query);
			
		}
		
		
		/* (non-Javadoc)
		 * @see i_db#prepare
		 */
		public function prepare($query) {
			$this->prep = $this->connection->prepare($query);
		}
		
		
		/* (non-Javadoc)
		 * @see i_db#exe_prepare
		 */
		public function exe_prepare() {
			
			if(func_num_args() != 0) {
				$this->prep->bind_param(func_get_args());
			}
			
			$this->prep->execute();
			
			$this->result = $this->prep->get_result();
				
		}
		
		public function get_next_result($type) {
			return $this->result->fetch_object($type);
		}
	}
?>