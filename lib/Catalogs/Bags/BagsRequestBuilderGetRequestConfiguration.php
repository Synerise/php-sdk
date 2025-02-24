<?php

namespace Synerise\Api\Catalogs\Bags;

use Microsoft\Kiota\Abstractions\BaseRequestConfiguration;
use Microsoft\Kiota\Abstractions\RequestOption;

/**
 * Configuration for the request such as headers, query parameters, and middleware options.
*/
class BagsRequestBuilderGetRequestConfiguration extends BaseRequestConfiguration 
{
    /**
     * @var BagsRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public ?BagsRequestBuilderGetQueryParameters $queryParameters = null;
    
    /**
     * Instantiates a new BagsRequestBuilderGetRequestConfiguration and sets the default values.
     * @param array<string, array<string>|string>|null $headers Request headers
     * @param array<RequestOption>|null $options Request options
     * @param BagsRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public function __construct(?array $headers = null, ?array $options = null, ?BagsRequestBuilderGetQueryParameters $queryParameters = null) {
        parent::__construct($headers ?? [], $options ?? []);
        $this->queryParameters = $queryParameters;
    }

    /**
     * Instantiates a new BagsRequestBuilderGetQueryParameters.
     * @param int|null $limit The maximum number of items to include in the response
     * @param int|null $offset The offset for the search. For example, if your `limit` is 10 and you want to retrieve the third page of items, set the offset to 20. Items with indexes 20 to 29 are returned (the first item on the first page has the index 0).
     * @param GetOrderByQueryParameterType|null $orderBy The parameter to order the results by. Order is always ascending.
     * @param string|null $searchBy A search string. You can search the catalogs by their name or the first or last name of the author.
     * @return BagsRequestBuilderGetQueryParameters
    */
    public static function createQueryParameters(?int $limit = null, ?int $offset = null, ?GetOrderByQueryParameterType $orderBy = null, ?string $searchBy = null): BagsRequestBuilderGetQueryParameters {
        return new BagsRequestBuilderGetQueryParameters($limit, $offset, $orderBy, $searchBy);
    }

}
