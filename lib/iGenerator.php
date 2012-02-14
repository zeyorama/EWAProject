<?php

/**
 * Generator interface for Singleton class which creates HTML-Content
 * @author Markus Benjamin Kretsch, Frank Kevin Zey
 */
interface i_gen {
	
	/**
	 * Function to return the only instance of the Generator object
	 * @return Generator object
	 */
	static function instance();
	
	/**
	 * Function to print the HTML content based on the variables
	 */
	public function print_html();
	
	/**
	 * Function to add HTML to content
	 * @param Text: $content(HTML)
	 */
	public function add_content($content);
	
	/**
	 * The parameter set the title of the page
	 * @param Text: $title
	 */
	public function set_title($title);
	
}

?>