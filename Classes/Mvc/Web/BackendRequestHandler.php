<?php
namespace TYPO3\CMS\Extbase\Mvc\Web;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2010 Jochen Rau <jochen.rau@typoplanet.de>
 *  All rights reserved
 *
 *  This class is a backport of the corresponding class of FLOW3.
 *  All credits go to the v5 team.
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
 * A request handler which can handle web requests invoked by the backend.
 */
class BackendRequestHandler extends \TYPO3\CMS\Extbase\Mvc\Web\AbstractRequestHandler {

	/**
	 * Handles the web request. The response will automatically be sent to the client.
	 *
	 * @return \TYPO3\CMS\Extbase\Mvc\Web\Response
	 */
	public function handleRequest() {
		$request = $this->requestBuilder->build();
		/** @var $requestHashService \TYPO3\CMS\Extbase\Security\Channel\RequestHashService */
		$requestHashService = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Security\\Channel\\RequestHashService');
		$requestHashService->verifyRequest($request);
		$response = $this->objectManager->create('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Response');
		$this->dispatcher->dispatch($request, $response);
		return $response;
	}

	/**
	 * This request handler can handle a web request invoked by the backend.
	 *
	 * @return boolean If we are in backend mode TRUE otherwise FALSE
	 */
	public function canHandleRequest() {
		return TYPO3_MODE === 'BE';
	}

}


?>