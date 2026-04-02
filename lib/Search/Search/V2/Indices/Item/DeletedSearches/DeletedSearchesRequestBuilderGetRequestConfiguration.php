<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\DeletedSearches;

use Microsoft\Kiota\Abstractions\BaseRequestConfiguration;
use Microsoft\Kiota\Abstractions\RequestOption;

/**
 * Configuration for the request such as headers, query parameters, and middleware options.
*/
class DeletedSearchesRequestBuilderGetRequestConfiguration extends BaseRequestConfiguration 
{
    /**
     * @var DeletedSearchesRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public ?DeletedSearchesRequestBuilderGetQueryParameters $queryParameters = null;
    
    /**
     * Instantiates a new DeletedSearchesRequestBuilderGetRequestConfiguration and sets the default values.
     * @param array<string, array<string>|string>|null $headers Request headers
     * @param array<RequestOption>|null $options Request options
     * @param DeletedSearchesRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public function __construct(?array $headers = null, ?array $options = null, ?DeletedSearchesRequestBuilderGetQueryParameters $queryParameters = null) {
        parent::__construct($headers ?? [], $options ?? []);
        $this->queryParameters = $queryParameters;
    }

    /**
     * Instantiates a new DeletedSearchesRequestBuilderGetQueryParameters.
     * @param string|null $clientUUID UUID of the profile for which the search is performed
     * @return DeletedSearchesRequestBuilderGetQueryParameters
    */
    public static function createQueryParameters(?string $clientUUID = null): DeletedSearchesRequestBuilderGetQueryParameters {
        return new DeletedSearchesRequestBuilderGetQueryParameters($clientUUID);
    }

}
