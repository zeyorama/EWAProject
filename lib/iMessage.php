<?php

/**
 * @author Markus Benjamin Kretsch, Frank Kevin Zey
 */
interface i_mess {
	
	/**
	 * Give the ID of the message
	 * @return integer - ID of message
	 */
	public function getId();
	
	/**
	 * Give the subject of the message
	 * @return string - Subject of message 
	 */
	public function getSubject();
	
	/**
	 * Give the content of the message
	 * @return string - Content of message
	 */
	public function getContent();
	
	/**
	 * Give the send Date of the message
	 * @return string - Timestamp of the message
	 */
	public function getSendDate();
	
	/**
	 * Give the id of the user which the message come from
	 * @return integer - id of the user which the message come from 
	 */
	public function getFromUser();
	
	/**
	 * Give the id of the user which the message is send to
	 * @return integer - id of the user which the message is send to
	 */
	public function getToUser();
	
	
}

?>