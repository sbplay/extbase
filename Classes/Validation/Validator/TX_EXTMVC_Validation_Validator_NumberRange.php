<?php

/*                                                                        *
 * This script belongs to the FLOW3 framework.                            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

require_once(t3lib_extMgm::extPath('extmvc') . 'Classes/Validation/Validator/TX_EXTMVC_Validation_Validator_ValidatorInterface.php');

/**
 * Validator for general numbers
 *
 * @version $ID:$
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class TX_EXTMVC_Validation_Validator_NumberRange implements TX_EXTMVC_Validation_Validator_ValidatorInterface {

	/**
	 * Returns TRUE, if the given property ($propertyValue) is a valid number in the given range.
	 *
	 * If at least one error occurred, the result is FALSE and any errors will
	 * be stored in the given errors object.
	 *
	 * @param mixed $value The value that should be validated
	 * @param TX_EXTMVC_Validation_Errors $errors An Errors object which will contain any errors which occurred during validation
	 * @param array $validationOptions Not used
	 * @return boolean TRUE if the value is valid, FALSE if an error occured
	 */
	public function isValid($value, TX_EXTMVC_Validation_Errors &$errors, array $validationOptions = array()) {
		if (!is_numeric($value)) {
			$errors->append('The given subject was not a valid number. Got: "' . $value . '"');
			return FALSE;
		}

		$startRange = (isset($validationOptions['startRange'])) ? intval($validationOptions['startRange']) : 0;
		$endRange = (isset($validationOptions['endRange'])) ? intval($validationOptions['endRange']) : PHP_INT_MAX;
		if ($startRange > $endRange) {
			$x = $startRange;
			$startRange = $endRange;
			$endRange = $x;
		}
		if ($value >= $startRange && $value <= $endRange) return TRUE;

		$errors->append('The given subject was not in the valid range (' . $startRange . ', ' . $endRange . ').');
		return FALSE;
	}
}

?>