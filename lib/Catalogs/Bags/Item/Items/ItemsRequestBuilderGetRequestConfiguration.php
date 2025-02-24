<?php

namespace Synerise\Api\Catalogs\Bags\Item\Items;

use Microsoft\Kiota\Abstractions\BaseRequestConfiguration;
use Microsoft\Kiota\Abstractions\RequestOption;

/**
 * Configuration for the request such as headers, query parameters, and middleware options.
*/
class ItemsRequestBuilderGetRequestConfiguration extends BaseRequestConfiguration 
{
    /**
     * @var ItemsRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public ?ItemsRequestBuilderGetQueryParameters $queryParameters = null;
    
    /**
     * Instantiates a new ItemsRequestBuilderGetRequestConfiguration and sets the default values.
     * @param array<string, array<string>|string>|null $headers Request headers
     * @param array<RequestOption>|null $options Request options
     * @param ItemsRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public function __construct(?array $headers = null, ?array $options = null, ?ItemsRequestBuilderGetQueryParameters $queryParameters = null) {
        parent::__construct($headers ?? [], $options ?? []);
        $this->queryParameters = $queryParameters;
    }

    /**
     * Instantiates a new ItemsRequestBuilderGetQueryParameters.
     * @param string|null $itemKey Filter by the value of the unique identifier of the item (exact match)
     * @param int|null $limit The maximum number of items to include in the response
     * @param int|null $offset The offset for the search. For example, if your `limit` is 10 and you want to retrieve the third page of items, set the offset to 20. Items with indexes 20 to 29 are returned (the first item on the first page has the index 0).
     * @param string|null $searchBy A search string. You can search the catalogs by their name or the first or last name of the author.
     * @return ItemsRequestBuilderGetQueryParameters
    */
    public static function createQueryParameters(?string $itemKey = null, ?int $limit = null, ?int $offset = null, ?string $searchBy = null): ItemsRequestBuilderGetQueryParameters {
        return new ItemsRequestBuilderGetQueryParameters($itemKey, $limit, $offset, $searchBy);
    }

}
