<?php

	include_once 'iDatabase.php';
	
	final class Database implements i_db {
		private static $instance = NULL;
		
		private $connection = NULL;
		private $result = NULL;
		private $array = NULL;
		
		/**
		 * Private constructor for singleton class
		 */
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
			$this->result = $this->connection->prepare($query);
		}
		
		
		/* (non-Javadoc)
		 * @see i_db#exe_prepare
		 */
		public function exe_prepare() {
			
			if(func_num_args() != 0) { 

				$method = new ReflectionMethod('mysqli_stmt', 'bind_param');  
       	$method->invokeArgs($this->result,func_get_args());
			}
			
			$this->result->execute();
			
			unset($this->array);
			for($i = 0; $i < $this->result->field_count; $i++) {
				$this->array[] = 0;
			}
			$method = new ReflectionMethod('mysqli_stmt', 'bind_result');
			$method->invokeArgs($this->result, $this->array);
			
			/*
			 * works definitely for Php version 5.3.10
			 * For Php version < 5.3.10 Workaround
			 */
			//$this->result = $this->prep->get_result();
		}
	
		/* (non-Javadoc)
		 * @see i_db#get_next_result
		*/
		public function get_next_result($type) {
			class_exists($type) or die("Class $type not Found");
			
			if($this->result instanceof mysqli_result) {
				$tmp = $this->result->fetch_object($type);
			} else {
				if($this->result->fetch()) {
					foreach ($this->array as $key => $value) {
						$this->array[$key] = (string)$value;
					}
					$tmp = new $type($this->array);
				} else {
					$tmp = NULL;
				}
			}
			
			if($tmp == NULL) {
				$this->result->close();
				return NULL;
			}
			return $tmp;
		}
		
		/* (non-Javadoc)
		 * @see i_db#get_length
		*/
		public function get_length() {
			return $this->result->num_rows;
		}
  
	}
?>
