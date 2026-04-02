<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\DeletedSearches;

use Microsoft\Kiota\Abstractions\BaseRequestConfiguration;
use Microsoft\Kiota\Abstractions\RequestOption;

/**
 * Configuration for the request such as headers, query parameters, and middleware options.
*/
class DeletedSearchesRequestBuilderPostRequestConfiguration extends BaseRequestConfiguration 
{
    /**
     * @var DeletedSearchesRequestBuilderPostQueryParameters|null $queryParameters Request query parameters
    */
    public ?DeletedSearchesRequestBuilderPostQueryParameters $queryParameters = null;
    
    /**
     * Instantiates a new DeletedSearchesRequestBuilderPostRequestConfiguration and sets the default values.
     * @param array<string, array<string>|string>|null $headers Request headers
     * @param array<RequestOption>|null $options Request options
     * @param DeletedSearchesRequestBuilderPostQueryParameters|null $queryParameters Request query parameters
    */
    public function __construct(?array $headers = null, ?array $options = null, ?DeletedSearchesRequestBuilderPostQueryParameters $queryParameters = null) {
        parent::__construct($headers ?? [], $options ?? []);
        $this->queryParameters = $queryParameters;
    }

    /**
     * Instantiates a new DeletedSearchesRequestBuilderPostQueryParameters.
     * @param string|null $clientUUID UUID of the profile for which the search is performed
     * @return DeletedSearchesRequestBuilderPostQueryParameters
    */
    public static function createQueryParameters(?string $clientUUID = null): DeletedSearchesRequestBuilderPostQueryParameters {
        return new DeletedSearchesRequestBuilderPostQueryParameters($clientUUID);
    }

}
