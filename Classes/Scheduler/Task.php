<?php
namespace TYPO3\CMS\Extbase\Scheduler;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Claus Due, Wildside A/S <claus@wildside.dk>
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
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/**
 * Scheduler task to execute CommandController commands
 *
 * @package Extbase
 * @subpackage Scheduler
 */
class Task extends Tx_Scheduler_Task {

	/**
	 * @var string
	 */
	protected $commandIdentifier;

	/**
	 * @var array
	 */
	protected $arguments = array();

	/**
	 * @var array
	 */
	protected $defaults = array();

	/**
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
	 */
	protected $objectManager;

	/**
	 * @var \TYPO3\CMS\Extbase\Mvc\Cli\CommandManager
	 */
	protected $commandManager;

	/**
	 * @var \TYPO3\CMS\Extbase\Scheduler\TaskExecutor
	 */
	protected $taskExecutor;

	/**
	 * Function execute from the Scheduler
	 *
	 * @return boolean TRUE on successful execution, FALSE on error
	 */
	public function execute() {
		$this->objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
		$this->commandManager = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Mvc\\Cli\\CommandManager');
		$this->taskExecutor = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Scheduler\\TaskExecutor');
		try {
			$this->taskExecutor->execute($this);
			return TRUE;
		} catch (\Exception $e) {
			\TYPO3\CMS\Core\Utility\GeneralUtility::sysLog($e->getMessage(), $this->commandIdentifier, 3);
			return FALSE;
		}
	}

	/**
	 * @param string $commandIdentifier
	 */
	public function setCommandIdentifier($commandIdentifier) {
		$this->commandIdentifier = $commandIdentifier;
	}

	/**
	 * @return string
	 */
	public function getCommandIdentifier() {
		return $this->commandIdentifier;
	}

	/**
	 * @param array $arguments
	 */
	public function setArguments($arguments) {
		$this->arguments = $arguments;
	}

	/**
	 * @return array
	 */
	public function getArguments() {
		return $this->arguments;
	}

	/**
	 * @param array $defaults
	 */
	public function setDefaults(array $defaults) {
		$this->defaults = $defaults;
	}

	/**
	 * @return array
	 */
	public function getDefaults() {
		return $this->defaults;
	}

	/**
	 * @param string $argumentName
	 * @param mixed $argumentValue
	 */
	public function addDefaultValue($argumentName, $argumentValue) {
		if (is_bool($argumentValue)) {
			$argumentValue = intval($argumentValue);
		}
		$this->defaults[$argumentName] = $argumentValue;
	}

	/**
	 * Return a text representation of the selected command and arguments
	 *
	 * @return string Information to display
	 */
	public function getAdditionalInformation() {
		$label = $this->commandIdentifier;
		if (count($this->arguments) > 0) {
			$arguments = array();
			foreach ($this->arguments as $argumentName => $argumentValue) {
				if ($argumentValue != $this->defaults[$argumentName]) {
					array_push($arguments, ($argumentName . '=') . $argumentValue);
				}
			}
			$label .= ' ' . implode(', ', $arguments);
		}
		return $label;
	}

}


?>