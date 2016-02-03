<?php
namespace Swisscom\Neos\CaseInsensitiveUrls\Aspect;
/*                                                                        *
 * This script belongs to the TYPO3 Flow package                          *
 * "Swisscom.Neos.CaseInsensitiveUrls"                                    *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * Class LowercaseRoutePartAspect
 *
 * @Flow\Aspect
 * @Flow\Scope("singleton")
 */
class LowercaseRoutePartAspect {

	/**
	 * Initializes the object after all dependencies have been injected
	 */
	public function initializeObject() {
	}

	/**
	 * @Flow\Before("method(TYPO3\Neos\Routing\FrontendNodeRoutePartHandler->matchValue())")
	 * @return void
	 */
	public function convertRoutePartToLowerCase(\TYPO3\Flow\AOP\JoinPointInterface $joinPoint) {
		$requestPath = $joinPoint->getMethodArgument('requestPath');

		if (strpos($requestPath, 'user')) {
			$parts = explode("user", $requestPath);
			$lowerCaseRequestPath = strtolower($parts[0]) . "user" . $parts[1];
		} else {
			$lowerCaseRequestPath = strtolower($requestPath);
		}
		$joinPoint->setMethodArgument('requestPath', $lowerCaseRequestPath);
	}
}
