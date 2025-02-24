<?php

namespace Synerise\Api\Uauth\ApiKey;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\Uauth\ApiKey\PermissionCheck\PermissionCheckRequestBuilder;

/**
 * Builds and executes requests for operations under /api-key
*/
class ApiKeyRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The permissionCheck property
    */
    public function permissionCheck(): PermissionCheckRequestBuilder {
        return new PermissionCheckRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new ApiKeyRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/api-key');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
