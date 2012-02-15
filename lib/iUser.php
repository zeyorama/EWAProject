<?php 

interface i_user {
	
	/**
	 * Gives all videos from this user
	 * @return [Video-Object] - returns array of all videos
	 */
	function getVideos();
	
	/**
	 * Gives all events from this user
	 * @return [Event-Object] - returns array of all events
	 */
	function getEvents();
	
	/**
	 * Is user an admin?
	 * @return boolean - admin-yes or no
	 */
	function isAdmin();
	
	/**
	 * Gives the actual grade of this user.
	 * @return int - returns the grade of this user as int value
	 */
	function getBelt();
	
	/**
	 * Set the last sign in in date
	 * @param timestamp - returns the last sign in date
	 */
	function setlastSignIn($time);
	
	/**
	 * Sets the CurrentSessionId of this user
	 * @param String - CurrentSessionId of this user
	 */
	function setSessionId($session_id);
	
	/**
	 * Gives the last sign in date
	 * @return timestamp - returns the last sign in date
	 */
	function lastSignIn();
	
	/**
	 * Gets the CurrentSessionId of this user
	 * @return String - returns the CurrentSessionId of this user
	 */
	function getSessionId();
	
	/**
	 * Gives the date, when this user registered
	 * @return timestamp - returns the date, when this user registered
	 */
	function registeredAt();
	
	/**
	 * Gets the nick name of this user
	 * @return String - returns the nick name of this user
	 */
	function getNick();
	
	/**
	 * Gives the mail address of this user
	 * @return String - returns users mail address
	 */
	function getMail();
	
	/**
	 * Update the User data in database
	 */
	function updateDB();
	
}

?>