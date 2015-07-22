<?php
/**
 * Dealing with encrypted configuration files
 *
 * @author Skyler Rexroad
 */

require_once("aes256.php");

/**
 * reads an encrypted configuration file and decrypts and parses the parameters
 *
 * @param string $filename encrypted file name to read
 * @return array all the parameters parsed from the configuration file
 * @throws InvalidArgumentException if parsing or decryption is unsuccessful
 **/
function readConfig($filename) {
	// verify the file is readable
	if(is_readable($filename) === false) {
		throw(new InvalidArgumentException("configuration file is not readable"));
	}

	// read the encrypted config file
	if(($ciphertext = file_get_contents($filename)) == false) {
		throw(new InvalidArgumentException("unable to read configuration file"));
	}

	// decrypt the file
	try {
		// password variable redacted for security reasons :D
		// suffice to say the password is derived from known server variables
		$password = "--PASSWORD--";
		$plaintext = aes256Decrypt($ciphertext, $password);
	} catch(InvalidArgumentException $invalidArgument) {
		throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
	}

	// parse the parameters and return them
	if(($parameters = parse_ini_string($plaintext)) === false) {
		throw(new InvalidArgumentException("unable to parse parameters"));
	}
	return ($parameters);
}

/**
 * encrypts and writes an array of parameters to a configuration file
 *
 * @param array $parameters configuration parameters to write
 * @param string $filename filename to write to
 * @throws InvalidArgumentException if the parameters are invalid or the file cannot be accessed
 **/
function writeConfig($parameters, $filename) {
	// verify the parameters are an array
	if(is_array($parameters) === false) {
		throw(new InvalidArgumentException("parameters are not an array"));
	}

	// verify the file name is writable
	if(is_writable($filename) === false) {
		throw(new InvalidArgumentException("configuration file is not writable"));
	}

	// build the plaintext to encrypt
	$plaintext = "";
	foreach($parameters as $key => $value) {
		// quote strings
		if(is_string($value) === true) {
			$value = str_replace("\"", "\\\"", $value);
			$value = "\"$value\"";
		}

		// transform booleans to "On" and "Off"
		if(is_bool($value)) {
			if($value === true) {
				$value = "On";
			} else {
				$value = "Off";
			}
		}
		$plaintext = $plaintext . "$key = $value\n";
	}
	// delete the final newline
	$plaintext = substr($plaintext, 0, -1);

	// encrypt the text using the filename
	// password variable redacted for security reasons :D
	// suffice to say the password is derived from known server variables
	$password = "--PASSWORD--";
	$ciphertext = aes256Encrypt($plaintext, $password);

	// open the config file and write the cipher text
	if(file_put_contents($filename, $ciphertext) === false) {
		throw(new InvalidArgumentException("unable to write configuration file"));
	}
}

/**
 * connects to a mySQL database using the encrypted mySQL configuration
 *
 * @param string $filename path to the encrypted mySQL configuration file
 * @return PDO connection to mySQL
 **/
function connectToEncryptedMySQL($filename) {
	// grab the encrypted mySQL properties file and create the DSN
	$config = readConfig($filename);
	$dsn = "mysql:host=" . $config["hostname"] . ";dbname=" . $config["database"];
	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

	// create the PDO interface and return it
	$pdo = new PDO($dsn, $config["username"], $config["password"], $options);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return ($pdo);
}