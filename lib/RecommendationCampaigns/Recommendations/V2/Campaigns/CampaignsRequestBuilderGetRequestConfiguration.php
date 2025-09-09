<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns;

use Microsoft\Kiota\Abstractions\BaseRequestConfiguration;
use Microsoft\Kiota\Abstractions\RequestOption;

/**
 * Configuration for the request such as headers, query parameters, and middleware options.
*/
class CampaignsRequestBuilderGetRequestConfiguration extends BaseRequestConfiguration 
{
    /**
     * @var CampaignsRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public ?CampaignsRequestBuilderGetQueryParameters $queryParameters = null;
    
    /**
     * Instantiates a new CampaignsRequestBuilderGetRequestConfiguration and sets the default values.
     * @param array<string, array<string>|string>|null $headers Request headers
     * @param array<RequestOption>|null $options Request options
     * @param CampaignsRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public function __construct(?array $headers = null, ?array $options = null, ?CampaignsRequestBuilderGetQueryParameters $queryParameters = null) {
        parent::__construct($headers ?? [], $options ?? []);
        $this->queryParameters = $queryParameters;
    }

    /**
     * Instantiates a new CampaignsRequestBuilderGetQueryParameters.
     * @param bool|null $includeMeta If true, a `meta` JSON block with pagination data is included in the response body.If false, the pagination data is included in the response headers.
     * @param int|null $limit Maximum number of campaigns on a page
     * @param GetOrderingQueryParameterType|null $ordering Sorting order
     * @param int|null $page Page number
     * @param string|null $search Searches campaigns by the specified phrase in their `id` and `title`.
     * @param GetSortByQueryParameterType|null $sortBy Name of the field by which data will be sorted
     * @param array<GetStateQueryParameterType>|null $state Shows only results with states matching this parameter. When this parameter is omitted, all campaigns are returned regardless of state.
     * @param string|null $type Filters the results by campaign type.
     * @return CampaignsRequestBuilderGetQueryParameters
    */
    public static function createQueryParameters(?bool $includeMeta = null, ?int $limit = null, ?GetOrderingQueryParameterType $ordering = null, ?int $page = null, ?string $search = null, ?GetSortByQueryParameterType $sortBy = null, ?array $state = null, ?string $type = null): CampaignsRequestBuilderGetQueryParameters {
        return new CampaignsRequestBuilderGetQueryParameters($includeMeta, $limit, $ordering, $page, $search, $sortBy, $state, $type);
    }

}
