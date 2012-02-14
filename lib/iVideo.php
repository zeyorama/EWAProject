<?php 

public interface i_video {
	
	/**
	 * @return int - returns the release year of this video as integer
	 */
	function getRelease();
	
	/**
	 * @return String - returns the title of this video
	 */
	function getTitle();
	
	/**
	 * @return int - returns the duration of this video
	 */
	function getDuration();
	
	/**
	 * @return int - returns the FSK as integer
	 */
	function getFSK();
	
	/**
	 * @return genre-object - returns the genre of this video
	 */
	function getGenre();	
	
}

?>