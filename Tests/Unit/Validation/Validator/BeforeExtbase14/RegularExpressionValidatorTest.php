<?php
namespace TYPO3\CMS\Extbase\Tests\Unit\Validation\Validator\BeforeExtbase14;

/***************************************************************
 *  Copyright notice
 *
 *  This class is a backport of the corresponding class of TYPO3 Flow.
 *  All credits go to the TYPO3 Flow team.
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  A copy is found in the text file GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/**
 * Testcase for the regular expression validator
 *
 * This testcase checks the expected behavior for Extbase < 1.4.0, to make sure
 * we do not break backwards compatibility.
 */
class RegularExpressionValidatorTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {

	/**
	 * @test
	 */
	public function regularExpressionValidatorMatchesABasicExpressionCorrectly() {
		$regularExpressionValidator = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\RegularExpressionValidator', array('addError', 'translateErrorMessage'), array(), '', FALSE);
		$regularExpressionValidator->expects($this->once())->method('addError');
		$regularExpressionValidator->setOptions(array('regularExpression' => '/^simple[0-9]expression$/'));
		$regularExpressionValidator->isValid('simple1expression');
		$regularExpressionValidator->isValid('simple1expressions');
	}

	/**
	 * @test
	 */
	public function regularExpressionValidatorCreatesTheCorrectErrorIfTheExpressionDidNotMatch() {
		$regularExpressionValidator = $this->getMock('TYPO3\\CMS\\Extbase\\Validation\\Validator\\RegularExpressionValidator', array('addError', 'translateErrorMessage'), array(), '', FALSE);
		// we only test for the error key, after the translation method is mocked.
		$regularExpressionValidator->expects($this->once())->method('addError')->with(NULL, 1221565130);
		$regularExpressionValidator->setOptions(array('regularExpression' => '/^simple[0-9]expression$/'));
		$regularExpressionValidator->isValid('some subject that will not match');
	}
}
