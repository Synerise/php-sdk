<?php

namespace Synerise\Api\V4\Clients\Merge\From;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\V4\Clients\Merge\From\CustomIds\CustomIdsRequestBuilder;
use Synerise\Api\V4\Clients\Merge\From\Ids\IdsRequestBuilder;

/**
 * Builds and executes requests for operations under /clients/merge/from
*/
class FromRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The customIds property
    */
    public function customIds(): CustomIdsRequestBuilder {
        return new CustomIdsRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The ids property
    */
    public function ids(): IdsRequestBuilder {
        return new IdsRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new FromRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/clients/merge/from');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
