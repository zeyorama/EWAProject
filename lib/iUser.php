<?php 

public interface i_user {
	
	/**
	 * Gives you all videos from this user
	 * @return [Video-Object] - returns array of all videos
	 */
	function getVideos();
	
	/**
	 * Gives you all events from this user
	 * @return [Event-Object] - returns array of all events
	 */
	function getEvents();
	
	/**
	 * Is user an admin?
	 * @return boolean - admin-yes or no
	 */
	function isAdmin();
	
	/**
	 * Generates a new user object and returns it.
	 * @param user_query_result - result object from query after fetching
	 * @return new user object from database
	 */
	static function getUserFromDatabase($user_query_result);
	
}

?>