<?php
	include_once 'iDatabase.php';
	class Database implements i_db {
		
		static private $instance = false;
		private $connection;
		
		private function __construct() {}
		
		/* (non-Javadoc)
		 * @see i_db#instance
		*/
		static function instance() {
			if(!Database::$instance) {
				Database::$instance = new Database();
			}
			return Database::$instance;
		}
		
		/* (non-Javadoc)
		 * @see i_db#connect
		 */
		public function connect($user, $pass, $schema) {
			$connection = new mysqli('localhost', $user, $pass, $schema);
		}
		
		
		/* (non-Javadoc)
		 * @see i_db#close
		 */
		public function close() {
			$connection->close();
		}
		
		
		/* (non-Javadoc)
		 * @see i_db#query
		 */
		public function query($query) {
			
		}
		
		
		/* (non-Javadoc)
		 * @see i_db#perpare
		 */
		public function perpare($query) {
			
		}
		
		
		/* (non-Javadoc)
		 * @see i_db#exe_prepare
		 */
		public function exe_prepare() {
			
		}
		
		
		/* (non-Javadoc)
		 * @see i_db#result
		 */
		public function result() {
			
		}
	}
?>