<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\RecentSearches;

/**
 * Get a profile's recent searches from a particular index.
*/
class RecentSearchesRequestBuilderGetQueryParameters 
{
    /**
     * @var string|null $clientUUID UUID of the profile for which the search is performed
    */
    public ?string $clientUUID = null;
    
    /**
     * @var GetTimeUnitQueryParameterType|null $timeUnit The time unit. Used in conjunction with `timeValue`.<br><strong>NOTE:</strong><br> The provided query parameter has priority over the configuration provided in [this endpoint](#operation/postIndexConfigV2). If the parameter is not provided, the default value does **not** override the configuration.
    */
    public ?GetTimeUnitQueryParameterType $timeUnit = null;
    
    /**
     * @var int|null $timeValue The amount of time units. Used in conjunction with `timeUnit`.<br><strong>NOTE:</strong><br> The provided query parameter has priority over the configuration provided in [this endpoint](#operation/postIndexConfigV2). If the parameter is not provided, the default value does **not** override the configuration.
    */
    public ?int $timeValue = null;
    
    /**
     * @var int|null $windowSize Maximum number of recent searches to be returned. <br><strong>NOTE:</strong><br> The provided query parameter has priority over the configuration provided in [this endpoint](#operation/postIndexConfigV2). If the parameter is not provided, the default value does **not** override the configuration.
    */
    public ?int $windowSize = null;
    
    /**
     * Instantiates a new RecentSearchesRequestBuilderGetQueryParameters and sets the default values.
     * @param string|null $clientUUID UUID of the profile for which the search is performed
     * @param GetTimeUnitQueryParameterType|null $timeUnit The time unit. Used in conjunction with `timeValue`.<br><strong>NOTE:</strong><br> The provided query parameter has priority over the configuration provided in [this endpoint](#operation/postIndexConfigV2). If the parameter is not provided, the default value does **not** override the configuration.
     * @param int|null $timeValue The amount of time units. Used in conjunction with `timeUnit`.<br><strong>NOTE:</strong><br> The provided query parameter has priority over the configuration provided in [this endpoint](#operation/postIndexConfigV2). If the parameter is not provided, the default value does **not** override the configuration.
     * @param int|null $windowSize Maximum number of recent searches to be returned. <br><strong>NOTE:</strong><br> The provided query parameter has priority over the configuration provided in [this endpoint](#operation/postIndexConfigV2). If the parameter is not provided, the default value does **not** override the configuration.
    */
    public function __construct(?string $clientUUID = null, ?GetTimeUnitQueryParameterType $timeUnit = null, ?int $timeValue = null, ?int $windowSize = null) {
        $this->clientUUID = $clientUUID;
        $this->timeUnit = $timeUnit;
        $this->timeValue = $timeValue;
        $this->windowSize = $windowSize;
    }

}
