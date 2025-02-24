<?php

namespace Synerise\Api\Authentication;

use Microsoft\Kiota\Abstractions\ApiClientBuilder;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\Authentication\Auth\AuthRequestBuilder;

/**
 * The main entry point of the SDK, exposes the configuration and the fluent API.
*/
class Authentication extends BaseRequestBuilder 
{
    /**
     * The auth property
    */
    public function auth(): AuthRequestBuilder {
        return new AuthRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new Authentication and sets the default values.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct(RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}');
        if (empty($this->requestAdapter->getBaseUrl())) {
            $this->requestAdapter->setBaseUrl('https://api.synerise.com/v4');
        }
        $this->pathParameters['baseurl'] = $this->requestAdapter->getBaseUrl();
    }

}
