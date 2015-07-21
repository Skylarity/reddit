<?php

/**
 * Profile class for a reddit user.
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
	 * @param int $newProfileId ID of the profile
	 */
	public function setProfileId($newProfileId) {
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

}