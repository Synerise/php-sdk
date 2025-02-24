<?php

namespace Synerise\Api\SearchConfig\Search\V2\Indices;

use Microsoft\Kiota\Abstractions\BaseRequestConfiguration;
use Microsoft\Kiota\Abstractions\RequestOption;

/**
 * Configuration for the request such as headers, query parameters, and middleware options.
*/
class IndicesRequestBuilderGetRequestConfiguration extends BaseRequestConfiguration 
{
    /**
     * @var IndicesRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public ?IndicesRequestBuilderGetQueryParameters $queryParameters = null;
    
    /**
     * Instantiates a new IndicesRequestBuilderGetRequestConfiguration and sets the default values.
     * @param array<string, array<string>|string>|null $headers Request headers
     * @param array<RequestOption>|null $options Request options
     * @param IndicesRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public function __construct(?array $headers = null, ?array $options = null, ?IndicesRequestBuilderGetQueryParameters $queryParameters = null) {
        parent::__construct($headers ?? [], $options ?? []);
        $this->queryParameters = $queryParameters;
    }

    /**
     * Instantiates a new IndicesRequestBuilderGetQueryParameters.
     * @param bool|null $excludeAbTests Only indices not involved in currently running AB tests will be retrieved.
     * @param bool|null $includeMeta When `true`, pagination metadata is included in the response body.When `false`, the data is included in the response headers:- Link: links to neighbors, first, and last pages in pagination.- X-Pagination-Total-Count: total number of items on all pages- X-Pagination-Total-Pages: total number of pages- X-Pagination-Page: current page- X-Pagination-Limit: maximum number of items on a page- X-Pagination-Sorted-By: parameter that the items were sorted by- X-Pagination-Ordering: sorting direction
     * @param int|null $limit The number of items to return per page
     * @param string|null $name Deprecated parameter. If `query` is provided, this parameter is ignored.    If an index has an `id` equal to the value of this parameter, only that index will be retrieved. Otherwise, all indices containing this value in their `name` will be retrieved.
     * @param GetOrderingQueryParameterType|null $ordering Sorting order
     * @param int|null $page Page number to return for pagination. The first page has the index `1`.
     * @param string|null $query If an index has an `id` equal to the value of this parameter, only that index will be retrieved. Otherwise, all indices containing this value in their `name` will be retrieved. This parameter replaces the deprecated `name` parameter.
     * @param string|null $sortBy Name of the attribute by which the data will be sorted
     * @return IndicesRequestBuilderGetQueryParameters
    */
    public static function createQueryParameters(?bool $excludeAbTests = null, ?bool $includeMeta = null, ?int $limit = null, ?string $name = null, ?GetOrderingQueryParameterType $ordering = null, ?int $page = null, ?string $query = null, ?string $sortBy = null): IndicesRequestBuilderGetQueryParameters {
        return new IndicesRequestBuilderGetQueryParameters($excludeAbTests, $includeMeta, $limit, $name, $ordering, $page, $query, $sortBy);
    }

}
