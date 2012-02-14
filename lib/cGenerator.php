<?php
	include_once 'lib/iGenerator.php';
	final class Generator implements i_gen {
		private static $instance = NULL;
		
		private $title = "No Title";
		private $content = "No Content";
		
		private function __construct() {}
		
		/* (non-Javadoc)
		 * @see i_gen#instance
		*/
		public static function instance() {
			if(self::$instance === NULL) {
				self::$instance = new self;
			}
			return self::$instance;
		}
		
		/* (non-Javadoc)
		 * @see i_gen#set_title
		*/
		public function set_title($title) {
			$this->title = $title;
		}
		
		/* (non-Javadoc)
		 * @see i_gen#add_content
		*/
		public function add_content($content) {
			if(strcmp($this->content, "No Content")) {
				$this->content .= $content;	
			} else {
				$this->content = $content;
			}
		}
		
		/* (non-Javadoc)
		 * @see i_gen#print_html
		*/
		public function print_html() {
			echo "
			<html>
				<head>
					<title>
					{$this->title}
					</title>
				</head>
				<body>
					{$this->content}
				</body>
			</html>
			";
		}
	}
?>