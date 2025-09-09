<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Simplified;

use Microsoft\Kiota\Abstractions\BaseRequestConfiguration;
use Microsoft\Kiota\Abstractions\RequestOption;

/**
 * Configuration for the request such as headers, query parameters, and middleware options.
*/
class SimplifiedRequestBuilderGetRequestConfiguration extends BaseRequestConfiguration 
{
    /**
     * @var SimplifiedRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public ?SimplifiedRequestBuilderGetQueryParameters $queryParameters = null;
    
    /**
     * Instantiates a new SimplifiedRequestBuilderGetRequestConfiguration and sets the default values.
     * @param array<string, array<string>|string>|null $headers Request headers
     * @param array<RequestOption>|null $options Request options
     * @param SimplifiedRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public function __construct(?array $headers = null, ?array $options = null, ?SimplifiedRequestBuilderGetQueryParameters $queryParameters = null) {
        parent::__construct($headers ?? [], $options ?? []);
        $this->queryParameters = $queryParameters;
    }

    /**
     * Instantiates a new SimplifiedRequestBuilderGetQueryParameters.
     * @param array<GetStateQueryParameterType>|null $state Filter by states.
     * @param array<string>|null $type Filter by campaign type.
     * @return SimplifiedRequestBuilderGetQueryParameters
    */
    public static function createQueryParameters(?array $state = null, ?array $type = null): SimplifiedRequestBuilderGetQueryParameters {
        return new SimplifiedRequestBuilderGetQueryParameters($state, $type);
    }

}
