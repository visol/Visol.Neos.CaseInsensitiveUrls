<?php
namespace Swisscom\Neos\CaseInsensitiveUrls\Aspect;
/*                                                                        *
 * This script belongs to the TYPO3 Flow package                          *
 * "Swisscom.Neos.CaseInsensitiveUrls"                                    *
 *                                                                        *
 *                                                                        */

use Neos\Flow\Annotations as Flow;

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
	public function convertRoutePartToLowerCase(\Neos\Flow\AOP\JoinPointInterface $joinPoint) {
		$lowerCaseRequestPath = strtolower($joinPoint->getMethodArgument('requestPath'));

		$joinPoint->setMethodArgument('requestPath', $lowerCaseRequestPath);
	}
}