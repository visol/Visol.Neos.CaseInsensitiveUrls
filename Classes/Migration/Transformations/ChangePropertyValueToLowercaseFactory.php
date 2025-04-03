<?php

namespace Visol\Neos\CaseInsensitiveUrls\Migration\Transformations;

use Neos\ContentRepository\Core\ContentRepository;
use Neos\ContentRepository\Core\DimensionSpace\DimensionSpacePointSet;
use Neos\ContentRepository\Core\Feature\NodeModification\Command\SetNodeProperties;
use Neos\ContentRepository\Core\Feature\NodeModification\Dto\PropertyValuesToWrite;
use Neos\ContentRepository\Core\Projection\ContentGraph\Node;
use Neos\ContentRepository\Core\SharedModel\Workspace\WorkspaceName;
use Neos\ContentRepository\NodeMigration\Transformation\GlobalTransformationInterface;
use Neos\ContentRepository\NodeMigration\Transformation\NodeAggregateBasedTransformationInterface;
use Neos\ContentRepository\NodeMigration\Transformation\NodeBasedTransformationInterface;
use Neos\ContentRepository\NodeMigration\Transformation\TransformationFactoryInterface;
use Neos\ContentRepository\NodeMigration\Transformation\TransformationStep;

class ChangePropertyValueToLowercaseFactory implements TransformationFactoryInterface
{
    /**
     * @param array<string,array<string,string>> $settings
     */
    public function build(
        array $settings,
        ContentRepository $contentRepository,
    ): GlobalTransformationInterface|NodeAggregateBasedTransformationInterface|NodeBasedTransformationInterface {
        return new class (
            $settings['property']
        ) implements NodeBasedTransformationInterface {
            public function __construct(
                private readonly string $property
            ) {
            }

            public function execute(
                Node $node,
                DimensionSpacePointSet $coveredDimensionSpacePoints,
                WorkspaceName $workspaceNameForWriting
            ): TransformationStep {
                $newPropertyValue = strtolower($node->getProperty($this->property));

                return TransformationStep::fromCommand(
                    SetNodeProperties::create(
                        $workspaceNameForWriting,
                        $node->aggregateId,
                        $node->originDimensionSpacePoint,
                        PropertyValuesToWrite::fromArray([
                            $this->property => $newPropertyValue,
                        ])
                    )
                );
            }
        };
    }
}

