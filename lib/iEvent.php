<?php 

public interface i_event {
	
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
	
}

?>