<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\RecentSearches;

use Microsoft\Kiota\Abstractions\BaseRequestConfiguration;
use Microsoft\Kiota\Abstractions\RequestOption;

/**
 * Configuration for the request such as headers, query parameters, and middleware options.
*/
class RecentSearchesRequestBuilderGetRequestConfiguration extends BaseRequestConfiguration 
{
    /**
     * @var RecentSearchesRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public ?RecentSearchesRequestBuilderGetQueryParameters $queryParameters = null;
    
    /**
     * Instantiates a new RecentSearchesRequestBuilderGetRequestConfiguration and sets the default values.
     * @param array<string, array<string>|string>|null $headers Request headers
     * @param array<RequestOption>|null $options Request options
     * @param RecentSearchesRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public function __construct(?array $headers = null, ?array $options = null, ?RecentSearchesRequestBuilderGetQueryParameters $queryParameters = null) {
        parent::__construct($headers ?? [], $options ?? []);
        $this->queryParameters = $queryParameters;
    }

    /**
     * Instantiates a new RecentSearchesRequestBuilderGetQueryParameters.
     * @param string|null $clientUUID UUID of the profile for which the search is performed
     * @param GetTimeUnitQueryParameterType|null $timeUnit The time unit. Used in conjunction with `timeValue`.<br><strong>NOTE:</strong><br> The provided query parameter has priority over the configuration provided in [this endpoint](#operation/postIndexConfigV2). If the parameter is not provided, the default value does **not** override the configuration.
     * @param int|null $timeValue The amount of time units. Used in conjunction with `timeUnit`.<br><strong>NOTE:</strong><br> The provided query parameter has priority over the configuration provided in [this endpoint](#operation/postIndexConfigV2). If the parameter is not provided, the default value does **not** override the configuration.
     * @param int|null $windowSize Maximum number of recent searches to be returned. <br><strong>NOTE:</strong><br> The provided query parameter has priority over the configuration provided in [this endpoint](#operation/postIndexConfigV2). If the parameter is not provided, the default value does **not** override the configuration.
     * @return RecentSearchesRequestBuilderGetQueryParameters
    */
    public static function createQueryParameters(?string $clientUUID = null, ?GetTimeUnitQueryParameterType $timeUnit = null, ?int $timeValue = null, ?int $windowSize = null): RecentSearchesRequestBuilderGetQueryParameters {
        return new RecentSearchesRequestBuilderGetQueryParameters($clientUUID, $timeUnit, $timeValue, $windowSize);
    }

}
