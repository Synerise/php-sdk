<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\Query\Explain;

use Microsoft\Kiota\Abstractions\BaseRequestConfiguration;
use Microsoft\Kiota\Abstractions\RequestOption;

/**
 * Configuration for the request such as headers, query parameters, and middleware options.
*/
class ExplainRequestBuilderGetRequestConfiguration extends BaseRequestConfiguration 
{
    /**
     * @var ExplainRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public ?ExplainRequestBuilderGetQueryParameters $queryParameters = null;
    
    /**
     * Instantiates a new ExplainRequestBuilderGetRequestConfiguration and sets the default values.
     * @param array<string, array<string>|string>|null $headers Request headers
     * @param array<RequestOption>|null $options Request options
     * @param ExplainRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public function __construct(?array $headers = null, ?array $options = null, ?ExplainRequestBuilderGetQueryParameters $queryParameters = null) {
        parent::__construct($headers ?? [], $options ?? []);
        $this->queryParameters = $queryParameters;
    }

    /**
     * Instantiates a new ExplainRequestBuilderGetQueryParameters.
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
     * @return ExplainRequestBuilderGetQueryParameters
    */
    public static function createQueryParameters(?bool $caseSensitiveFacetValues = null, ?string $clientUUID = null, ?array $context = null, ?string $correlationId = null, ?array $displayAttributes = null, ?string $distinctFilter = null, ?array $excludeQueryRules = null, ?array $facets = null, ?int $facetsSize = null, ?int $filterAroundRadius = null, ?array $filterGeoPoints = null, ?string $filters = null, ?bool $ignoreQueryRules = null, ?GetIncludeFacetsQueryParameterType $includeFacets = null, ?bool $includeMeta = null, ?int $limit = null, ?int $maxValuesPerFacet = null, ?GetOrderingQueryParameterType $ordering = null, ?int $page = null, ?bool $personalize = null, ?string $query = null, ?string $searchId = null, ?string $sortBy = null, ?string $sortByGeoPoint = null, ?GetSortByMetricQueryParameterType $sortByMetric = null): ExplainRequestBuilderGetQueryParameters {
        return new ExplainRequestBuilderGetQueryParameters($caseSensitiveFacetValues, $clientUUID, $context, $correlationId, $displayAttributes, $distinctFilter, $excludeQueryRules, $facets, $facetsSize, $filterAroundRadius, $filterGeoPoints, $filters, $ignoreQueryRules, $includeFacets, $includeMeta, $limit, $maxValuesPerFacet, $ordering, $page, $personalize, $query, $searchId, $sortBy, $sortByGeoPoint, $sortByMetric);
    }

}
