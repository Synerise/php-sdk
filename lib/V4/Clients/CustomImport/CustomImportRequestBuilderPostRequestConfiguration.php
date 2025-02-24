<?php

namespace Synerise\Api\V4\Clients\CustomImport;

use Microsoft\Kiota\Abstractions\BaseRequestConfiguration;
use Microsoft\Kiota\Abstractions\RequestOption;

/**
 * Configuration for the request such as headers, query parameters, and middleware options.
*/
class CustomImportRequestBuilderPostRequestConfiguration extends BaseRequestConfiguration 
{
    /**
     * @var CustomImportRequestBuilderPostQueryParameters|null $queryParameters Request query parameters
    */
    public ?CustomImportRequestBuilderPostQueryParameters $queryParameters = null;
    
    /**
     * Instantiates a new CustomImportRequestBuilderPostRequestConfiguration and sets the default values.
     * @param array<string, array<string>|string>|null $headers Request headers
     * @param array<RequestOption>|null $options Request options
     * @param CustomImportRequestBuilderPostQueryParameters|null $queryParameters Request query parameters
    */
    public function __construct(?array $headers = null, ?array $options = null, ?CustomImportRequestBuilderPostQueryParameters $queryParameters = null) {
        parent::__construct($headers ?? [], $options ?? []);
        $this->queryParameters = $queryParameters;
    }

    /**
     * Instantiates a new CustomImportRequestBuilderPostQueryParameters.
     * @param bool|null $phoneFilter Enables to searching profiles by phone in database if email is missing
     * @return CustomImportRequestBuilderPostQueryParameters
    */
    public static function createQueryParameters(?bool $phoneFilter = null): CustomImportRequestBuilderPostQueryParameters {
        return new CustomImportRequestBuilderPostQueryParameters($phoneFilter);
    }

}
