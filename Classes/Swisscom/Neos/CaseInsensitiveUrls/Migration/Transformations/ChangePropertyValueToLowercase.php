<?php
namespace Swisscom\Neos\CaseInsensitiveUrls\Migration\Transformations;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package                          *
 * "Swisscom.Neos.CaseInsensitiveUrls"                                    *
 *                                                                        *
 *                                                                        */

use Neos\Flow\Annotations as Flow;
use Neos\ContentRepository\Migration\Transformations\AbstractTransformation;

/**
 * Change the value of a given property to lowercase.
 */
class ChangePropertyValueToLowercase extends AbstractTransformation {

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
	public function setProperty($propertyName) {
		$this->propertyName = $propertyName;
	}

	/**
	 * If the given node has the property this transformation should work on, this
	 * returns TRUE.
	 *
	 * @param \Neos\ContentRepository\Domain\Model\NodeData $node
	 * @return boolean
	 */
	public function isTransformable(\Neos\ContentRepository\Domain\Model\NodeData $node) {
		return ($node->hasProperty($this->propertyName));
	}

	/**
	 * Change the property on the given node.
	 *
	 * @param \Neos\√\Domain\Model\NodeData $node
	 * @return void
	 */
	public function execute(\Neos\ContentRepository\Domain\Model\NodeData $node) {
		$currentPropertyValue = $node->getProperty($this->propertyName);
		$newPropertyValue = strtolower($currentPropertyValue);
		$node->setProperty($this->propertyName, $newPropertyValue);
	}
}