<?php

namespace Synerise\Api\SearchConfig\Search\V2\SuggestionIndices;

/**
 * Retrieve a list of all suggestion index configurations in the workspace.
*/
class SuggestionIndicesRequestBuilderGetQueryParameters 
{
    /**
     * @var bool|null $includeMeta When `true`, pagination metadata is included in the response body.When `false`, the data is included in the response headers:- Link: links to neighbors, first, and last pages in pagination.- X-Pagination-Total-Count: total number of items on all pages- X-Pagination-Total-Pages: total number of pages- X-Pagination-Page: current page- X-Pagination-Limit: maximum number of items on a page- X-Pagination-Sorted-By: parameter that the items were sorted by- X-Pagination-Ordering: sorting direction
    */
    public ?bool $includeMeta = null;
    
    /**
     * @var int|null $limit The number of items to return per page
    */
    public ?int $limit = null;
    
    /**
     * @var string|null $name Deprecated parameter. If `query` is provided, this parameter is ignored.    If an index has an `id` equal to the value of this parameter, only that index will be retrieved. Otherwise, all indices containing this value in their `name` will be retrieved.
    */
    public ?string $name = null;
    
    /**
     * @var GetOrderingQueryParameterType|null $ordering Sorting order
    */
    public ?GetOrderingQueryParameterType $ordering = null;
    
    /**
     * @var int|null $page Page number to return for pagination. The first page has the index `1`.
    */
    public ?int $page = null;
    
    /**
     * @var string|null $query If an index has an `id` equal to the value of this parameter, only that index will be retrieved. Otherwise, all indices containing this value in their `name` will be retrieved. This parameter replaces the deprecated `name` parameter.
    */
    public ?string $query = null;
    
    /**
     * @var string|null $sortBy Name of the attribute by which the data will be sorted
    */
    public ?string $sortBy = null;
    
    /**
     * Instantiates a new SuggestionIndicesRequestBuilderGetQueryParameters and sets the default values.
     * @param bool|null $includeMeta When `true`, pagination metadata is included in the response body.When `false`, the data is included in the response headers:- Link: links to neighbors, first, and last pages in pagination.- X-Pagination-Total-Count: total number of items on all pages- X-Pagination-Total-Pages: total number of pages- X-Pagination-Page: current page- X-Pagination-Limit: maximum number of items on a page- X-Pagination-Sorted-By: parameter that the items were sorted by- X-Pagination-Ordering: sorting direction
     * @param int|null $limit The number of items to return per page
     * @param string|null $name Deprecated parameter. If `query` is provided, this parameter is ignored.    If an index has an `id` equal to the value of this parameter, only that index will be retrieved. Otherwise, all indices containing this value in their `name` will be retrieved.
     * @param GetOrderingQueryParameterType|null $ordering Sorting order
     * @param int|null $page Page number to return for pagination. The first page has the index `1`.
     * @param string|null $query If an index has an `id` equal to the value of this parameter, only that index will be retrieved. Otherwise, all indices containing this value in their `name` will be retrieved. This parameter replaces the deprecated `name` parameter.
     * @param string|null $sortBy Name of the attribute by which the data will be sorted
    */
    public function __construct(?bool $includeMeta = null, ?int $limit = null, ?string $name = null, ?GetOrderingQueryParameterType $ordering = null, ?int $page = null, ?string $query = null, ?string $sortBy = null) {
        $this->includeMeta = $includeMeta;
        $this->limit = $limit;
        $this->name = $name;
        $this->ordering = $ordering;
        $this->page = $page;
        $this->query = $query;
        $this->sortBy = $sortBy;
    }

}
