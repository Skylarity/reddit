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
	 * @param string $class_name name of class to load
	 * @throws Exception unable to load class
	 */
	private function classLoader($class_name) {
		if(file_exists($class_name . ".php")) {
			include_once($class_name . ".php");
		} else {
			throw(new Exception("Unable to load class \"$class_name\""));
		}
	}

}