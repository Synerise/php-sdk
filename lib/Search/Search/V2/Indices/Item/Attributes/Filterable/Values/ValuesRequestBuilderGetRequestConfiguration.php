<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\Attributes\Filterable\Values;

use Microsoft\Kiota\Abstractions\BaseRequestConfiguration;
use Microsoft\Kiota\Abstractions\RequestOption;

/**
 * Configuration for the request such as headers, query parameters, and middleware options.
*/
class ValuesRequestBuilderGetRequestConfiguration extends BaseRequestConfiguration 
{
    /**
     * @var ValuesRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public ?ValuesRequestBuilderGetQueryParameters $queryParameters = null;
    
    /**
     * Instantiates a new ValuesRequestBuilderGetRequestConfiguration and sets the default values.
     * @param array<string, array<string>|string>|null $headers Request headers
     * @param array<RequestOption>|null $options Request options
     * @param ValuesRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public function __construct(?array $headers = null, ?array $options = null, ?ValuesRequestBuilderGetQueryParameters $queryParameters = null) {
        parent::__construct($headers ?? [], $options ?? []);
        $this->queryParameters = $queryParameters;
    }

    /**
     * Instantiates a new ValuesRequestBuilderGetQueryParameters.
     * @param array<string>|null $attribute List of attributes for which values will be fetched
     * @return ValuesRequestBuilderGetQueryParameters
    */
    public static function createQueryParameters(?array $attribute = null): ValuesRequestBuilderGetQueryParameters {
        return new ValuesRequestBuilderGetQueryParameters($attribute);
    }

}
