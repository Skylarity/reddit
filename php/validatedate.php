<?php

/**
 * Date validation
 *
 * @author Skyler Rexroad
 */
trait ValidateDate {

	/**
	 * Converts a string to a DateTime object if valid.
	 *
	 * @param $date
	 * @return DateTime object containing the valid date.
	 */
	public function validate($date) {

		// If it's already a DateTime object, return it back
		if(is_object($date) === true && get_class($date) === "DateTime") {
			return ($date);
		}

		// See if the date is a valid MySQL date
		$date = trim($date);
		if(preg_match("/^(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/", $date, $matches) !== 1) {
			throw(new InvalidArgumentException("Date is not a valid date"));
		}

		// Verify the date is a valid calendar date
		$year = intval($matches[1]);
		$month = intval($matches[2]);
		$day = intval($matches[3]);
		$hour = intval($matches[4]);
		$minute = intval($matches[5]);
		$second = intval($matches[6]);
		if(checkdate($month, $day, $year) === false) {
			throw(new RangeException("Date $date is not a valid Gregorian date"));
		}

		// Verify the time is valid
		if($hour < 0 || $hour >= 24 || $minute < 0 || $minute >= 60 || $second < 0 || $second >= 60) {
			throw(new RangeException("date $date is not a valid time"));
		}

		// The date is clean at this point
		$date = DateTime::createFromFormat("Y-m-d H:i:s", $date);
		return ($date);

	}

}