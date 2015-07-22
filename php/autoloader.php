<?php

/**
 * Class autoloader
 *
 * @author Skyler Rexroad
 */

spl_autoload_register("Autoloader::classLoader");

class Autoloader {
	/**
	 * This function autoloads classes if they exist
	 *
	 * @param string $className name of class to load
	 * @throws Exception unable to load class
	 */
	public static function classLoader($className) {
		$className = strtolower($className);
		if(is_readable(__DIR__ . "/$className.php")) {
			require_once(__DIR__ . "/$className.php");
		} else {
			throw(new Exception("Unable to load $className.php"));
		}
	}

}