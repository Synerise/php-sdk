<?php

namespace Synerise\Api\Workspace\Tracker;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\Workspace\Tracker\GetOrCreateByDomain\GetOrCreateByDomainRequestBuilder;

/**
 * Builds and executes requests for operations under /tracker
*/
class TrackerRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The getOrCreateByDomain property
    */
    public function getOrCreateByDomain(): GetOrCreateByDomainRequestBuilder {
        return new GetOrCreateByDomainRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new TrackerRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/tracker');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
