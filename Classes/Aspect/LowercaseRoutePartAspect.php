<?php
namespace Visol\Neos\CaseInsensitiveUrls\Aspect;

/*
 * This file is part of the Swisscom.Neos.CaseInsensitiveUrls package.
 *
 * (c) Swisscom Internet Solutions
 * (c) visol digitale Dienstleistungen GmbH, www.visol.ch
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\AOP\JoinPointInterface;

/**
 * Class LowercaseRoutePartAspect
 *
 * @Flow\Aspect
 * @Flow\Scope("singleton")
 */
class LowercaseRoutePartAspect
{
    /**
     * @Flow\Before("method(Neos\Neos\Routing\FrontendNodeRoutePartHandler->matchValue())")
     * @param JoinPointInterface $joinPoint
     * @return void
     */
    public function convertRoutePartToLowerCase(JoinPointInterface $joinPoint)
    {
        $lowerCaseRequestPath = strtolower($joinPoint->getMethodArgument('requestPath'));

        $joinPoint->setMethodArgument('requestPath', $lowerCaseRequestPath);
    }
}
