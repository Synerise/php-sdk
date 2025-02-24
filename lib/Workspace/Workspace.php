<?php

namespace Synerise\Api\Workspace;

use Microsoft\Kiota\Abstractions\ApiClientBuilder;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\Workspace\Tracker\TrackerRequestBuilder;

/**
 * The main entry point of the SDK, exposes the configuration and the fluent API.
*/
class Workspace extends BaseRequestBuilder 
{
    /**
     * The tracker property
    */
    public function tracker(): TrackerRequestBuilder {
        return new TrackerRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new Workspace and sets the default values.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct(RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}');
        if (empty($this->requestAdapter->getBaseUrl())) {
            $this->requestAdapter->setBaseUrl('https://api.synerise.com/business-profile-service');
        }
        $this->pathParameters['baseurl'] = $this->requestAdapter->getBaseUrl();
    }

}
