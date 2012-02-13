<?php

/**
 * Database interface, need mysqli object
 * @author Markus Benjamin Kretsch, Frank Kevin Zey
 */
interface i_db {

	/**
	 * Etablish connection to MySQL Server
	 * @param user - username for authentication
	 * @param pass - password for authentication
	 * @param schema - name of database
	 * @return mysqli data object, returns null when an error occured
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
   */
  public function query($query);
  
  /**
   * Send query to MySQL Server to prepare
   * @param query - query to prepare
   */
  public function perpare($query);
  
  /**
   * Bind parameters to perpared query and execute them
   * @param optional: String for type-paddern to specify following arguments
   */
  public function exe_prepare();
  
  /**
   * Generates array of object from specified query
   * @return returns array of result objects, returns null, when no query executed
   * @throws could raise any Exceptions
   */
  public function result();
  
}

?>
