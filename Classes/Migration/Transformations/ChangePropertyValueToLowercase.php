<?php
namespace Swisscom\Neos\CaseInsensitiveUrls\Migration\Transformations;

/*
 * This file is part of the Swisscom.Neos.CaseInsensitiveUrls package.
 *
 * (c) Swisscom Internet Solutions
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\ContentRepository\Domain\Model\NodeData;
use Neos\ContentRepository\Migration\Transformations\AbstractTransformation;

/**
 * Change the value of a given property to lowercase.
 */
class ChangePropertyValueToLowercase extends AbstractTransformation
{
    /**
     * @var string
     */
    protected $propertyName;

    /**
     * Sets the name of the property to change.
     *
     * @param string $propertyName
     * @return void
     */
    public function setProperty($propertyName)
    {
        $this->propertyName = $propertyName;
    }

    /**
     * If the given node has the property this transformation should work on, this
     * returns TRUE.
     *
     * @param NodeData $node
     * @return boolean
     */
    public function isTransformable(NodeData $node)
    {
        return ($node->hasProperty($this->propertyName));
    }

    /**
     * Change the property on the given node.
     *
     * @param NodeData $node
     * @return void
     * @throws \Neos\ContentRepository\Exception\NodeException
     */
    public function execute(NodeData $node)
    {
        $currentPropertyValue = $node->getProperty($this->propertyName);
        $newPropertyValue = strtolower($currentPropertyValue);
        $node->setProperty($this->propertyName, $newPropertyValue);
    }
}
