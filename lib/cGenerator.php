<?php

	include_once 'lib/iGenerator.php';
	
	/**
	 * @author Markus Benjmain Kretsch
	 */
	final class Generator implements i_gen {
		private static $instance = NULL;
		
		private $title = "No Title";
		private $content = "No Content";

		/**
		 * Private constructor for Singleton class
		 */
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
			<meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\" />
			<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
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
