<?php

/**
 * Class autoloader
 *
 * @author Skyler Rexroad
 */
class Autoloader {

	/**
	 *
	 */
	public function __construct() {
		spl_autoload_register(array($this, 'classLoader'));
	}

	/**
	 * This function autoloads classes if they exist
	 *
	 * @param string $className name of class to load
	 * @throws Exception unable to load class
	 */
	private function classLoader($className) {
		if(file_exists($className . ".php")) {
			include_once($className . ".php");
		} else {
			throw(new Exception("Unable to load class \"$className\""));
		}
	}

}