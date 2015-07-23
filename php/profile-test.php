<?php
/**
 * Profile testing for a reddit user
 *
 * @author Skyler Rexroad
 */

require_once("/etc/apache2/data-design/encrypted-config.php");
require_once("profile.php");

try {
	$pdo = connectToEncryptedMySQL("/etc/apache2/data-design/srexroad.ini");
	$profiles = Profile::getAllProfiles($pdo);
	foreach($profiles as $profile) {
		echo $profile;
	}
} catch (PDOException $pdoException) {
	echo $pdoException->getMessage();
} catch (Exception $e) {
	echo $e->getMessage();
}