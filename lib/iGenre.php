<?php

/**
 * Genre interface for class which contains the data of genre
 * @author Markus Benjamin Kretsch, Frank Kevin Zey
 */
interface i_genre {
	
	/**
	 * give the Index back
	 * @return Genre: Int
	 */
	public function getIndex();
	
	/**
	 * give the Genre back
	 * @return Genre: String
	 */
	public function getGenre();
	
	/**
	 * set the Genre
	 * @param $genre: String
	 */
	public function setGenre($genre);
	
	/**
	 * set the Index
	 * @param $index: Int
	 */
	public function setIndex($index);
	
}

?>