<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\Query;

/**
 * Retrieves items that match a full-text query from a search index or a suggestion index. The results can be filtered and sorted.
*/
class QueryRequestBuilderGetQueryParameters 
{
    /**
     * @var bool|null $caseSensitiveFacetValues Specifies whether facets aggregation should be case sensitive.
    */
    public ?bool $caseSensitiveFacetValues = null;
    
    /**
     * @var string|null $clientUUID UUID of the profile for which the search is performed
    */
    public ?string $clientUUID = null;
    
    /**
     * @var array<string>|null $context List of context strings for a search query
    */
    public ?array $context = null;
    
    /**
     * @var string|null $correlationId Correlation ID for pagination. If a search with the ID was performed recently (last 10 minutes), the cached results will be used.Do not send this if sortBy/filters/sorting order, etc. have changed - the cached results may have different order or may match different filters.
    */
    public ?string $correlationId = null;
    
    /**
     * @var array<string>|null $displayAttributes List of ad hoc attributes that will be returned for each found item
    */
    public ?array $displayAttributes = null;
    
    /**
     * @var string|null $distinctFilter DistinctFilter JSON as an URL-encoded string
    */
    public ?string $distinctFilter = null;
    
    /**
     * @var array<int>|null $excludeQueryRules List of query rules that will not be applied.
    */
    public ?array $excludeQueryRules = null;
    
    /**
     * @var array<string>|null $facets A list of attributes for which facets will be returned. A single `*` value matches all facetable attributes.To determine which groups of facets should be returned, use the `includeFacets` parameter.
    */
    public ?array $facets = null;
    
    /**
     * @var int|null $facetsSize Determines how many items will be used for facets aggregation.
    */
    public ?int $facetsSize = null;
    
    /**
     * @var int|null $filterAroundRadius Radius in meters to be used when filtering using geo-location. Can only be used when filtering by a single geo-point.
    */
    public ?int $filterAroundRadius = null;
    
    /**
     * @var array<string>|null $filterGeoPoints The definition of a geographical area to filter by.Given one geo-point, the results will be limited to a radius around a point. To override the default radius (1000 meters), provide the `filterAroundRadius` parameter.**Example input:** `["34.052235,-118.243685"]`Given two geo-points, the results will be limited to a rectangular area. The first point defines the upper-left corner of the rectangle and the second is the lower-right corner.**Example input:** `["50,-100", "25,150"]`Given three or more geo-points, the results will be limited to a polygonal area.**Example input:** `["50,0", "40,20", "-20,10"]`
    */
    public ?array $filterGeoPoints = null;
    
    /**
     * @var string|null $filters IQL query string. For details, see the [Help Center](https://help.synerise.com/developers/iql/).
    */
    public ?string $filters = null;
    
    /**
     * @var bool|null $ignoreQueryRules If set to `true`, query rules are not applied.
    */
    public ?bool $ignoreQueryRules = null;
    
    /**
     * @var GetIncludeFacetsQueryParameterType|null $includeFacets Determines which groups of facets will be returned: both filtered and unfiltered; just filtered; just unfiltered; or no group at at all.To determine which attributes should be returned as facets in each group, use the `facets` parameter.
    */
    public ?GetIncludeFacetsQueryParameterType $includeFacets = null;
    
    /**
     * @var bool|null $includeMeta When `true`, pagination metadata is included in the response body.When `false`, the data is included in the response headers:- Link: links to neighbors, first, and last pages in pagination.- X-Pagination-Total-Count: total number of items on all pages- X-Pagination-Total-Pages: total number of pages- X-Pagination-Page: current page- X-Pagination-Limit: maximum number of items on a page- X-Pagination-Sorted-By: parameter that the items were sorted by- X-Pagination-Ordering: sorting direction
    */
    public ?bool $includeMeta = null;
    
    /**
     * @var int|null $limit The number of items to return per page
    */
    public ?int $limit = null;
    
    /**
     * @var int|null $maxValuesPerFacet Determines how many values will be retrieved per facet.
    */
    public ?int $maxValuesPerFacet = null;
    
    /**
     * @var GetOrderingQueryParameterType|null $ordering Sorting order
    */
    public ?GetOrderingQueryParameterType $ordering = null;
    
    /**
     * @var int|null $page Page number to return for pagination. The first page has the index `1`.
    */
    public ?int $page = null;
    
    /**
     * @var bool|null $personalize If set to `false`, the search result is not personalized.
    */
    public ?bool $personalize = null;
    
    /**
     * @var string|null $query Query text to use in the search
    */
    public ?string $query = null;
    
    /**
     * @var string|null $searchId **DEPRECATED - use correlationId instead**Search ID for pagination. If a search with the ID was performed recently (last 10 minutes), the cached results will be used.Do not send this if sortBy/filters/sorting order, etc. have changed - the cached results may have different order or may match different filters.
    */
    public ?string $searchId = null;
    
    /**
     * @var string|null $sortBy Name of the attribute by which the data will be sorted.Sorting by attribute may cause a promoted item to be in a different position that defined in a query rule.
    */
    public ?string $sortBy = null;
    
    /**
     * @var string|null $sortByGeoPoint Geo-point (`{latitude},{longitude}`) for data sorting. Results are sorted by distance from this point. `ordering: asc` means "closest first".
    */
    public ?string $sortByGeoPoint = null;
    
    /**
     * @var GetSortByMetricQueryParameterType|null $sortByMetric Name of the metric by which the data will be sorted
    */
    public ?GetSortByMetricQueryParameterType $sortByMetric = null;
    
    /**
     * Instantiates a new QueryRequestBuilderGetQueryParameters and sets the default values.
     * @param bool|null $caseSensitiveFacetValues Specifies whether facets aggregation should be case sensitive.
     * @param string|null $clientUUID UUID of the profile for which the search is performed
     * @param array<string>|null $context List of context strings for a search query
     * @param string|null $correlationId Correlation ID for pagination. If a search with the ID was performed recently (last 10 minutes), the cached results will be used.Do not send this if sortBy/filters/sorting order, etc. have changed - the cached results may have different order or may match different filters.
     * @param array<string>|null $displayAttributes List of ad hoc attributes that will be returned for each found item
     * @param string|null $distinctFilter DistinctFilter JSON as an URL-encoded string
     * @param array<int>|null $excludeQueryRules List of query rules that will not be applied.
     * @param array<string>|null $facets A list of attributes for which facets will be returned. A single `*` value matches all facetable attributes.To determine which groups of facets should be returned, use the `includeFacets` parameter.
     * @param int|null $facetsSize Determines how many items will be used for facets aggregation.
     * @param int|null $filterAroundRadius Radius in meters to be used when filtering using geo-location. Can only be used when filtering by a single geo-point.
     * @param array<string>|null $filterGeoPoints The definition of a geographical area to filter by.Given one geo-point, the results will be limited to a radius around a point. To override the default radius (1000 meters), provide the `filterAroundRadius` parameter.**Example input:** `["34.052235,-118.243685"]`Given two geo-points, the results will be limited to a rectangular area. The first point defines the upper-left corner of the rectangle and the second is the lower-right corner.**Example input:** `["50,-100", "25,150"]`Given three or more geo-points, the results will be limited to a polygonal area.**Example input:** `["50,0", "40,20", "-20,10"]`
     * @param string|null $filters IQL query string. For details, see the [Help Center](https://help.synerise.com/developers/iql/).
     * @param bool|null $ignoreQueryRules If set to `true`, query rules are not applied.
     * @param GetIncludeFacetsQueryParameterType|null $includeFacets Determines which groups of facets will be returned: both filtered and unfiltered; just filtered; just unfiltered; or no group at at all.To determine which attributes should be returned as facets in each group, use the `facets` parameter.
     * @param bool|null $includeMeta When `true`, pagination metadata is included in the response body.When `false`, the data is included in the response headers:- Link: links to neighbors, first, and last pages in pagination.- X-Pagination-Total-Count: total number of items on all pages- X-Pagination-Total-Pages: total number of pages- X-Pagination-Page: current page- X-Pagination-Limit: maximum number of items on a page- X-Pagination-Sorted-By: parameter that the items were sorted by- X-Pagination-Ordering: sorting direction
     * @param int|null $limit The number of items to return per page
     * @param int|null $maxValuesPerFacet Determines how many values will be retrieved per facet.
     * @param GetOrderingQueryParameterType|null $ordering Sorting order
     * @param int|null $page Page number to return for pagination. The first page has the index `1`.
     * @param bool|null $personalize If set to `false`, the search result is not personalized.
     * @param string|null $query Query text to use in the search
     * @param string|null $searchId **DEPRECATED - use correlationId instead**Search ID for pagination. If a search with the ID was performed recently (last 10 minutes), the cached results will be used.Do not send this if sortBy/filters/sorting order, etc. have changed - the cached results may have different order or may match different filters.
     * @param string|null $sortBy Name of the attribute by which the data will be sorted.Sorting by attribute may cause a promoted item to be in a different position that defined in a query rule.
     * @param string|null $sortByGeoPoint Geo-point (`{latitude},{longitude}`) for data sorting. Results are sorted by distance from this point. `ordering: asc` means "closest first".
     * @param GetSortByMetricQueryParameterType|null $sortByMetric Name of the metric by which the data will be sorted
    */
    public function __construct(?bool $caseSensitiveFacetValues = null, ?string $clientUUID = null, ?array $context = null, ?string $correlationId = null, ?array $displayAttributes = null, ?string $distinctFilter = null, ?array $excludeQueryRules = null, ?array $facets = null, ?int $facetsSize = null, ?int $filterAroundRadius = null, ?array $filterGeoPoints = null, ?string $filters = null, ?bool $ignoreQueryRules = null, ?GetIncludeFacetsQueryParameterType $includeFacets = null, ?bool $includeMeta = null, ?int $limit = null, ?int $maxValuesPerFacet = null, ?GetOrderingQueryParameterType $ordering = null, ?int $page = null, ?bool $personalize = null, ?string $query = null, ?string $searchId = null, ?string $sortBy = null, ?string $sortByGeoPoint = null, ?GetSortByMetricQueryParameterType $sortByMetric = null) {
        $this->caseSensitiveFacetValues = $caseSensitiveFacetValues;
        $this->clientUUID = $clientUUID;
        $this->context = $context;
        $this->correlationId = $correlationId;
        $this->displayAttributes = $displayAttributes;
        $this->distinctFilter = $distinctFilter;
        $this->excludeQueryRules = $excludeQueryRules;
        $this->facets = $facets;
        $this->facetsSize = $facetsSize;
        $this->filterAroundRadius = $filterAroundRadius;
        $this->filterGeoPoints = $filterGeoPoints;
        $this->filters = $filters;
        $this->ignoreQueryRules = $ignoreQueryRules;
        $this->includeFacets = $includeFacets;
        $this->includeMeta = $includeMeta;
        $this->limit = $limit;
        $this->maxValuesPerFacet = $maxValuesPerFacet;
        $this->ordering = $ordering;
        $this->page = $page;
        $this->personalize = $personalize;
        $this->query = $query;
        $this->searchId = $searchId;
        $this->sortBy = $sortBy;
        $this->sortByGeoPoint = $sortByGeoPoint;
        $this->sortByMetric = $sortByMetric;
    }

}
