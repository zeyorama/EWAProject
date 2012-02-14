<?php

/**
 * Database interface for Singleton, need mysqli object
 * @author Markus Benjamin Kretsch, Frank Kevin Zey
 */
interface i_db {
	
	/**
	 * Function to return the only instance of the database object
	 * @return Database object
	 */
	public static function instance();

	/**
	 * Etablish connection to MySQL Server
	 * @param user - username for authentication
	 * @param pass - password for authentication
	 * @param schema - name of database
   * @throws could raise any Exceptions
	 */
  public function connect($user, $pass, $schema);
  
  /**
   * Close the connection to the MySQL Server
   * @return 0 for no errors while closing
   */
  public function close();
  
  /**
   * Executes a given query and get a result object
   * @param query - query to execute
   * @param type: type of result object
   */
  public function query($query, $type);
  
  /**
   * Send query to MySQL Server to prepare
   * @param query - query to prepare
   */
  public function prepare($query);
  
  /**
   * Bind parameters to perpared query and execute them
   * @param optional: String for type-paddern to specify following arguments
   */
  public function exe_prepare();
  
  /**
   * Bind parameters to perpared query and execute them
   * @param $type: Objecttype which should return
   * @return $type object - NULL wenn keins mehr vorhanden
   */
  public function get_next_result($type);
  
}

?>
