<?php

/**
 * Submission model for a reddit user
 *
 * @author Skyler Rexroad
 */
class Submission {

	use ValidateDate;

	/**
	 * ID for the submission; this is the primary key
	 * @var int $submissionId
	 */
	private $submissionId;

	/**
	 * Profile ID of the submitter; this is a foreign key
	 * @var int $profileId
	 */
	private $profileId;

	/**
	 * Score for the submission
	 * @var int $score
	 */
	private $score;

	/**
	 * Content of the submission
	 * @var string $submissionContent
	 */
	private $submissionContent;

	/**
	 * Boolean flag to check if the content has been edited
	 * @var boolean $edited
	 */
	private $edited;

	/**
	 * Date of the submission
	 * @var DateTime $submissionDate
	 */
	private $submissionDate;

	/**
	 * Constructor for a submission
	 * @param int $submissionId ID of the submission
	 * @param int $profileId ID of the submitter
	 * @param int $submissionContent Content of the submission
	 * @throws InvalidArgumentException If data types are invalid
	 * @throws RangeException If data is out of bounds
	 * @throws Exception For all other cases
	 */
	public function __construct($submissionId, $profileId, $submissionContent) {
		try {
			$this->setSubmissionId($submissionId);
			$this->setProfileId($profileId);
			$this->score = 0;
			$this->setSubmissionContent($submissionContent);
			$this->edited = false;
			$this->submissionDate = new DateTime("now");
		} catch(InvalidArgumentException $invalidArgument) {
			// Rethrow the exception to the caller
			throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(RangeException $range) {
			// Rethrow the exception to the caller
			throw(new RangeException($range->getMessage(), 0, $range));
		} catch(Exception $e) {
			throw(new Exception($e->getMessage(), 0, $e));
		}
	}

	/**
	 * Accessor for the submission ID
	 *
	 * @return int
	 */
	public function getSubmissionId() {
		return $this->submissionId;
	}

	/**
	 * Mutator for the submission ID
	 *
	 * @param mixed $newSubmissionId
	 */
	public function setSubmissionId($newSubmissionId) {
		// Base case: If the submission ID is null, this is a new submission without a MySQL assigned ID
		if($newSubmissionId === null) {
			$this->submissionId = null;
			return;
		}

		// Verify the new submission ID
		$newSubmissionId = filter_var($newSubmissionId, FILTER_VALIDATE_INT);
		if($newSubmissionId === false) {
			throw(new InvalidArgumentException("Submission ID is not a valid integer"));
		}

		// Verify the new submission ID is positive
		if($newSubmissionId <= 0) {
			throw(new RangeException("Submission ID is not positive"));
		}

		// Convert and store the new submission ID
		$this->submissionId = intval($newSubmissionId);
	}

	/**
	 * Accessor for the submitter ID
	 *
	 * @return int
	 */
	public function getProfileId() {
		return $this->profileId;
	}

	/**
	 * Mutator for profile ID
	 *
	 * @param int $newProfileId
	 */
	public function setProfileId($newProfileId) {
		$this->profileId = $newProfileId;
	}

	/**
	 * Accessor for the score
	 *
	 * @return int
	 */
	public function getScore() {
		return $this->score;
	}

	/**
	 * Mutator for the score
	 *
	 * @param int $score
	 */
	public function setScore($score) {
		if(is_int($score)) {
			$this->score = $score;
		} else {
			throw(new InvalidArgumentException("Score is not a valid number"));
		}
	}

	/**
	 * Accessor for the submission content
	 *
	 * @return string
	 */
	public function getSubmissionContent() {
		return $this->submissionContent;
	}

	/**
	 * Mutator for the submission content
	 *
	 * @param string $newSubmissionContent
	 */
	public function setSubmissionContent($newSubmissionContent) {
		// Verify the content is secure
		$newSubmissionContent = trim($newSubmissionContent);
		$newSubmissionContent = filter_var($newSubmissionContent, FILTER_SANITIZE_STRING);
		if(empty($newSubmissionContent) === true) {
			throw(new InvalidArgumentException("Content is empty or insecure"));
		}

		// Verify the content will fit in the database
		if(strlen($newSubmissionContent) > 64) {
			throw(new RangeException("Content too large"));
		}

		// Store the new content and mark as edited
		$this->edited = true;
		$this->submissionContent = $newSubmissionContent;
	}

	/**
	 * Accessor for the date of the submission
	 *
	 * @return DateTime
	 */
	public function getSubmissionDate() {
		return $this->submissionDate;
	}

	/**
	 * Mutator for the date of the submission
	 *
	 * @param DateTime $newSubmissionDate
	 */
	public function setSubmissionDate($newSubmissionDate) {
		$this->submissionDate = $this->validate($newSubmissionDate);
	}

}