<?php

namespace AlgoWeb\PODataLaravel\Serialisers;

use POData\Providers\Metadata\ResourceEntityType;

class IronicSerialiserDummy extends IronicSerialiser
{
    protected $expand = [];

    public function getCurrentExpandedProjectionNode()
    {
        return parent::getCurrentExpandedProjectionNode();
    }

    public function shouldExpandSegment($navigationPropertyName)
    {
        if (array_key_exists($navigationPropertyName, $this->expand)) {
            return $this->expand[$navigationPropertyName];
        }

        return parent::shouldExpandSegment($navigationPropertyName);
    }

    public function getProjectionNodes()
    {
        return parent::getProjectionNodes();
    }

    public function needNextPageLink($resultSetCount)
    {
        return parent::needNextPageLink($resultSetCount);
    }

    public function getNextLinkUri(&$lastObject)
    {
        return parent::getNextLinkUri($lastObject);
    }

    public function setLightStack(array $stack)
    {
        $this->lightStack = $stack;
    }

    public function setPropertyExpansion($propName, $toExpand = true)
    {
        $this->expand[$propName] = boolval($toExpand);
    }
    
    public function getConcreteTypeFromAbstractType(ResourceEntityType $resourceType, $payloadClass)
    {
        return parent::getConcreteTypeFromAbstractType($resourceType, $payloadClass);
    }
}
