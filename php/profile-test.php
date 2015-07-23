<?php
/**
 * Profile testing for a reddit user
 *
 * @author Skyler Rexroad
 */

require_once("/etc/apache2/data-design/encrypted-config.php");
require_once("autoloader.php");

try {
	$pdo = connectToEncryptedMySQL("/etc/apache2/data-design/srexroad.ini");

	$profiles = Profile::getAllProfiles($pdo);
	printProfiles($profiles);

} catch(PDOException $pdoException) {
	echo $pdoException->getMessage();
} catch(Exception $e) {
	echo $e->getMessage();
}

function printProfiles($profiles) {
	foreach($profiles as $profile) {
		echo $profile;
	}
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/profile-test.css">
		<title>Data Design Project</title>
	</head>
	<body>
	</body>
</html>