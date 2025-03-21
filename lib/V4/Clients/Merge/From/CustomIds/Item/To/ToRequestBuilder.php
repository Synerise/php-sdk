<?php

namespace Synerise\Api\V4\Clients\Merge\From\CustomIds\Item\To;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\V4\Clients\Merge\From\CustomIds\Item\To\CustomId\CustomIdRequestBuilder;

/**
 * Builds and executes requests for operations under /clients/merge/from/custom-ids/{sourceCustomIDs}/to
*/
class ToRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The customId property
    */
    public function customId(): CustomIdRequestBuilder {
        return new CustomIdRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new ToRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/clients/merge/from/custom-ids/{sourceCustomIDs}/to');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
