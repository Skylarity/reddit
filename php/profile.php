<?php

/**
 * Profile class for a reddit user
 *
 * @author Skyler Rexroad
 */
class Profile {

	/**
	 * ID for the profile; this is the primary key
	 * @var int $profileId
	 */
	private $profileId;

	/**
	 * Username for the profile
	 * @var string $username
	 */
	private $username;

	/**
	 * Has for the profile
	 * @var string $passwordHash
	 */
	private $passwordHash;

	/**
	 * Constructor for a profile
	 *
	 * @param int $profileId ID of the profile
	 * @param string $username Username of the profile
	 * @param string $hash Hash of the profile
	 * @throws InvalidArgumentException If the data is invalid
	 * @throws RangeException If the data is out of bounds
	 * @throws Exception For all other cases
	 */
	public function __construct($profileId, $username, $hash) {
		try {
			$this->setProfileId($profileId);
			$this->setUsername($username);
			$this->setPasswordHash($hash);
		} catch(InvalidArgumentException $invalidArgument) {
			// Rethrow exception to the caller
			throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(RangeException $range) {
			// Rethrow exception to the caller
			throw(new RangeException($range->getMessage(), 0, $range));
		} catch(Exception $e) {
			throw(new Exception($e->getMessage(), 0, $e));
		}
	}

	/**
	 * Accessor for profile ID
	 *
	 * @return int value of profile ID
	 */
	public function getProfileId() {
		return $this->profileId;
	}

	/**
	 * Mutator for profile ID
	 *
	 * @param mixed $newProfileId ID of the profile
	 */
	public function setProfileId($newProfileId) {
		// Base case: If the profile ID is null, this is a new profile without a MySQL assigned ID
		if($newProfileId === null) {
			$this->profileId = null;
			return;
		}

		// Verify the new profile ID
		$newProfileId = filter_var($newProfileId, FILTER_VALIDATE_INT);
		if($newProfileId === false) {
			throw(new InvalidArgumentException("Profile ID is not a valid integer"));
		}

		// Verify the new profile ID is positive
		if($newProfileId <= 0) {
			throw(new RangeException("Profile ID is not positive"));
		}

		// Convert and store the new profile ID
		$this->profileId = intval($newProfileId);
	}

	/**
	 * Accessor for the username
	 *
	 * @return string value of username
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * Mutator for the username
	 *
	 * @param string $newUsername username of the profile
	 */
	public function setUsername($newUsername) {
		// Verify the username is secure
		$newUsername = trim($newUsername);
		$newUsername = filter_var($newUsername, FILTER_SANITIZE_STRING);
		if(empty($newUsername) === true) {
			throw(new InvalidArgumentException("Username is empty or insecure"));
		}

		// Verify the username will fit in the database
		if(strlen($newUsername) > 64) {
			throw(new RangeException("Username too large"));
		}

		// Store the new username
		$this->username = $newUsername;
	}

	/**
	 * Accessor for the hash
	 *
	 * @return string value of hash
	 */
	public function getPasswordHash() {
		return $this->passwordHash;
	}

	/**
	 * Mutator for the hash
	 *
	 * @param string $newPasswordHash hash of the profile
	 */
	public function setPasswordHash($newPasswordHash) {
		// Verify the hash is secure
		$newPasswordHash = trim($newPasswordHash);
		$newPasswordHash = filter_var($newPasswordHash, FILTER_SANITIZE_STRING);
		if(empty($newPasswordHash) === true) {
			throw(new InvalidArgumentException("Hash is empty or insecure"));
		}

		// Verify the hash will fit in the database
		if(strlen($newPasswordHash) > 64) {
			throw(new RangeException("Hash too large"));
		}

		// Store the new hash
		$this->passwordHash = $newPasswordHash;
	}

	/**
	 * Inserts this profile into MySQL
	 *
	 * @param PDO $pdo pointer to PDO connection, by reference
	 * @throws PDOException when MySQL related errors occur
	 */
	public function insert(PDO &$pdo) {
		// Make sure this is a new profile
		if($this->profileId !== null) {
			throw(new PDOException("Not a new profile"));
		}

		// Create query template
		$query = "INSERT INTO profile(username, passwordHash) VALUES(:username, :passwordHash)";
		$statement = $pdo->prepare($query);

		// Bind the member variables to the placeholders in the templates
		$parameters = array("username" => $this->getUsername(), "passwordHash" => $this->getPasswordHash());
		$statement->execute($parameters);

		// Update the null profile ID with what MySQL has generated
		$this->setProfileId(intval($pdo->lastInsertId()));
	}

	/**
	 * Deletes this profile from MySQL
	 *
	 * @param PDO $pdo pointer to PDO connection, by reference
	 * @throws PDOException when MySQL related errors occur
	 */
	public function delete(PDO &$pdo) {
		// Make sure this profile already exists
		if($this->profileId === null) {
			throw(new PDOException("Unable to delete a profile that does not exist"));
		}

		// Create query template
		$query = "DELETE FROM profile WHERE profileId = :profileId";
		$statement = $pdo->prepare($query);

		// Bind the member variables to the placeholders in the templates
		$parameters = array("profileId" => $this->getProfileId());
		$statement->execute($parameters);
	}

	/**
	 * Updates this profile in MySQL
	 *
	 * @param PDO $pdo pointer to PDO connection, by reference
	 * @throws PDOException when MySQL related errors occur
	 */
	public function update(PDO &$pdo) {
		// Make sure this profile exists
		if($this->profileId == null) {
			throw(new PDOException("Unable to update a profile that does not exist"));
		}

		// Create query template
		$query = "UPDATE profile SET username = :username, passwordHash = :passwordHash WHERE profileId = :profileId";
		$statement = $pdo->prepare($query);

		// Bind the member variables to the placeholders in the templates
		$parameters = array("username" => $this->getUsername(), "passwordHash" => $this->getPasswordHash(), "profileId" => $this->getProfileId());
		$statement->execute($parameters);
	}

	/**
	 * Gets the profile by profile ID
	 *
	 * @param PDO $pdo pointer to PDO connection, by reference
	 * @param $profileId profile ID to search for
	 * @return mixed Profile found or null if not found
	 * @throws PDOException when MySQL related errors occur
	 */
	public function getProfileById(PDO &$pdo, $profileId) {
		// Sanitize the ID before searching
		$profileId = filter_var($profileId, FILTER_SANITIZE_INT);
		if ($profileId === false) {
			throw(new PDOException("Profile ID is not an integer"));
		}
		if($profileId <= 0) {
			throw(new PDOException("Profile ID is not positive"));
		}

		// Create query template
		$query = "SELECT profileId, username, passwordHash FROM profile WHERE profileId = :profileId";
		$statement = $pdo->prepare($query);

		// Bind profileId to placeholder
		$parameters = array("profileId" => $profileId);
		$statement->execute($parameters);

		// Grab the profile from MySQL
		try {
			$profile = null;
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$profile = new Profile($row["profileId"], $row["username"], $row["passwordHash"]);
			}
		} catch(Exception $e) {
			// If the row couldn't be converted, rethrow it
			throw(new PDOException($e->getMessage(), 0, $e));
		}

		return($profile);
	}

	/**
	 * Gets the profile by username
	 *
	 * @param PDO $pdo pointer to PDO connection, by reference
	 * @param $username username to search for
	 * @return SplFixedArray of Profiles found or null if not found
	 * @throws PDOException when MySQL related errors occur
	 */
	public function getProfileByUsername(PDO &$pdo, $username) {
		// Sanitize the username before searching
		$username = trim($username);
		$username = filter_var($username, FILTER_SANITIZE_STRING);
		if (empty($username) === true) {
			throw(new PDOException("Username is invalid"));
		}

		// Create query template
		$query = "SELECT profileId, username, passwordHash FROM profile WHERE username = :username";
		$statement = $pdo->prepare($query);

		// Bind username to placeholder
		$username = "%$username%";
		$parameters = array("username" => $username);
		$statement->execute($parameters);

		// Build an array of profiles
		$profiles = new SplFixedArray($statement->rowCount());
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$profile = new Profile($row["profileId"], $row["username"], $row["passwordHash"]);
				$profiles[$profiles->key()] = $profile;
				$profiles->next();
			} catch(Exception $e) {
				// If the row couldn't be converted, rethrow it
				throw(new PDOException($e->getMessage(), 0, $e));
			}
		}

		// Count the results in the array and return
		// 1) null if 0 results
		// 2) the entire array if >= 1 result
		$numberOfProfiles = count($profiles);
		if ($numberOfProfiles === 0) {
			return(0);
		} else {
			return($profiles);
		}
	}

	/**
	 * Gets all profiles
	 *
	 * @param PDO $pdo pointer to PDO connection, by reference
	 * @return SplFixedArray of Profiles found or null if not found
	 * @throws PDOException when MySQL related errors occur
	 */
	public static function getAllProfiles(PDO &$pdo) {
		// Create query template
		$query = "SELECT profileId, username, passwordHash FROM profile";
		$statement = $pdo->prepare($query);
		$statement->execute();

		// Build an array of profiles
		$profiles = new SplFixedArray($statement->rowCount());
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$profile = new Profile($row["profileId"], $row["username"], $row["passwordHash"]);
				$profiles[$profiles->key()] = $profile;
				$profiles->next();
			} catch(Exception $e) {
				// If the row couldn't be converted, rethrow it
				throw(new PDOException($e->getMessage(), 0, $e));
			}
		}

		// Count the results in the array and return
		// 1) null if 0 results
		// 2) the entire array if >= 1 result
		$numberOfProfiles = count($profiles);
		if ($numberOfProfiles === 0) {
			return(0);
		} else {
			return($profiles);
		}
	}

}