<?php 

/**
 * @author Markus Benjamin Kretsch, Frank Kevin Zey
 */
interface i_event {
	
	/**
	 * Sets the FSK for this whole event<br>
	 * <p>
	 * @pre There must be at least one video listed.
	 * </p>
	 * <p>
	 * @post The FSK of the event is set with the highest FSK of all videos.
	 * </p>
	 */
	function setFSK();
	
	/**
	 * Gives all videos listed for this event
	 * @return array [video-object] - returns all video objects listed for this event
	 */
	function getVideos();
	
	/**
	 * Gives the timestamp, when this event will begin
	 * @return timestamp - returns the date, when this event will begin
	 */
	function startDate();
	
	/**
	 * Gives the location of this event
	 * @return String - returns the event location
	 */
	function getLocation();
	
	/**
	 * Gives the user, who organizes this event
	 * @return user-object - returns an object of the user, who organizes this event
	 */
	function Owner();
	
	/**
	 * Calculate all users, who want to visit this event
	 * @return array [user-object] - returns all users, who visit this event, returns NULL, only the organizer visits this event
	 */
	function getAllVisitors();
	
	/**
	 * Gives the event_id;
	 * @return int - returns the event_id of this event object
	 */
	function getId();
	
	/**
	 * Gives the event name
	 * @return String - returns the event name
	 */
	function getName();
	
	/**
	 * Gives the event description
	 * @return String - returns the description of the event
	 */
	function getDescription();
	
	/**
	 * Gives the event fsk
	 * @return String - returns the fsk of the event
	 */
	function getFSK();
	
}

?>
