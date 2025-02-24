<?php

namespace Synerise\Api\V4\Events\Push;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\V4\Events\Push\Cancelled\CancelledRequestBuilder;
use Synerise\Api\V4\Events\Push\Clicked\ClickedRequestBuilder;
use Synerise\Api\V4\Events\Push\Received\ReceivedRequestBuilder;
use Synerise\Api\V4\Events\Push\Viewed\ViewedRequestBuilder;

/**
 * Builds and executes requests for operations under /events/push
*/
class PushRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The cancelled property
    */
    public function cancelled(): CancelledRequestBuilder {
        return new CancelledRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The clicked property
    */
    public function clicked(): ClickedRequestBuilder {
        return new ClickedRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The received property
    */
    public function received(): ReceivedRequestBuilder {
        return new ReceivedRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The viewed property
    */
    public function viewed(): ViewedRequestBuilder {
        return new ViewedRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new PushRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/events/push');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
