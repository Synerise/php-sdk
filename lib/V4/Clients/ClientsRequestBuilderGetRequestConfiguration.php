<?php

namespace Synerise\Api\V4\Clients;

use Microsoft\Kiota\Abstractions\BaseRequestConfiguration;
use Microsoft\Kiota\Abstractions\RequestOption;

/**
 * Configuration for the request such as headers, query parameters, and middleware options.
*/
class ClientsRequestBuilderGetRequestConfiguration extends BaseRequestConfiguration 
{
    /**
     * @var ClientsRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public ?ClientsRequestBuilderGetQueryParameters $queryParameters = null;
    
    /**
     * Instantiates a new ClientsRequestBuilderGetRequestConfiguration and sets the default values.
     * @param array<string, array<string>|string>|null $headers Request headers
     * @param array<RequestOption>|null $options Request options
     * @param ClientsRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public function __construct(?array $headers = null, ?array $options = null, ?ClientsRequestBuilderGetQueryParameters $queryParameters = null) {
        parent::__construct($headers ?? [], $options ?? []);
        $this->queryParameters = $queryParameters;
    }

    /**
     * Instantiates a new ClientsRequestBuilderGetQueryParameters.
     * @param bool|null $filtersanonymous When set to `true`, only anonymous profiles are listed
     * @param string|null $filtersemail Filter profiles by email
     * @param string|null $filtersfirstName Filter profiles by first name
     * @param string|null $filterslastName Filter profiles by last name
     * @param string|null $filtersphone Filter profiles by phone
     * @param int|null $pageIndex Number of pages to retrieve
     * @param int|null $pageSize Number of entries on a page
     * @param GetSortByQueryParameterType|null $sortBy Profile attribute by which the list will be sorted
     * @param GetSortOrderQueryParameterType|null $sortOrder Sorting order
     * @return ClientsRequestBuilderGetQueryParameters
    */
    public static function createQueryParameters(?bool $filtersanonymous = null, ?string $filtersemail = null, ?string $filtersfirstName = null, ?string $filterslastName = null, ?string $filtersphone = null, ?int $pageIndex = null, ?int $pageSize = null, ?GetSortByQueryParameterType $sortBy = null, ?GetSortOrderQueryParameterType $sortOrder = null): ClientsRequestBuilderGetQueryParameters {
        return new ClientsRequestBuilderGetQueryParameters($filtersanonymous, $filtersemail, $filtersfirstName, $filterslastName, $filtersphone, $pageIndex, $pageSize, $sortBy, $sortOrder);
    }

}
