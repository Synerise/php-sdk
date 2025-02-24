<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\Attributes\Filterable\Values;

/**
 * Retrieve values of filterable attributes.
*/
class ValuesRequestBuilderGetQueryParameters 
{
    /**
     * @var array<string>|null $attribute List of attributes for which values will be fetched
    */
    public ?array $attribute = null;
    
    /**
     * Instantiates a new ValuesRequestBuilderGetQueryParameters and sets the default values.
     * @param array<string>|null $attribute List of attributes for which values will be fetched
    */
    public function __construct(?array $attribute = null) {
        $this->attribute = $attribute;
    }

}
