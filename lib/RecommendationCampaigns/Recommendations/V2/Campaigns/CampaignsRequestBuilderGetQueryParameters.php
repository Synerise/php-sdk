<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns;

/**
 * Fetch all recommendation campaigns.
*/
class CampaignsRequestBuilderGetQueryParameters 
{
    /**
     * @var bool|null $includeMeta If true, a `meta` JSON block with pagination data is included in the response body.If false, the pagination data is included in the response headers.
    */
    public ?bool $includeMeta = null;
    
    /**
     * @var int|null $limit Maximum number of campaigns on a page
    */
    public ?int $limit = null;
    
    /**
     * @var GetOrderingQueryParameterType|null $ordering Sorting order
    */
    public ?GetOrderingQueryParameterType $ordering = null;
    
    /**
     * @var int|null $page Page number
    */
    public ?int $page = null;
    
    /**
     * @var string|null $search Searches campaigns by the specified phrase in their `id` and `title`.
    */
    public ?string $search = null;
    
    /**
     * @var GetSortByQueryParameterType|null $sortBy Name of the field by which data will be sorted
    */
    public ?GetSortByQueryParameterType $sortBy = null;
    
    /**
     * @var array<GetStateQueryParameterType> $state Shows only results with states matching this parameter. When this parameter is omitted, all campaigns are returned regardless of state.
    */
    public array $state;
    
    /**
     * @var string|null $type Filters the results by campaign type.
    */
    public ?string $type = null;
    
    /**
     * Instantiates a new CampaignsRequestBuilderGetQueryParameters and sets the default values.
     * @param bool|null $includeMeta If true, a `meta` JSON block with pagination data is included in the response body.If false, the pagination data is included in the response headers.
     * @param int|null $limit Maximum number of campaigns on a page
     * @param GetOrderingQueryParameterType|null $ordering Sorting order
     * @param int|null $page Page number
     * @param string|null $search Searches campaigns by the specified phrase in their `id` and `title`.
     * @param GetSortByQueryParameterType|null $sortBy Name of the field by which data will be sorted
     * @param array<GetStateQueryParameterType>|null $state Shows only results with states matching this parameter. When this parameter is omitted, all campaigns are returned regardless of state.
     * @param string|null $type Filters the results by campaign type.
    */
    public function __construct(?bool $includeMeta = null, ?int $limit = null, ?GetOrderingQueryParameterType $ordering = null, ?int $page = null, ?string $search = null, ?GetSortByQueryParameterType $sortBy = null, ?array $state = null, ?string $type = null) {
        $this->includeMeta = $includeMeta;
        $this->limit = $limit;
        $this->ordering = $ordering;
        $this->page = $page;
        $this->search = $search;
        $this->sortBy = $sortBy;
        $this->state = $state?? [];
        $this->type = $type;
    }

}
