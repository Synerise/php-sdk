<?php

namespace Synerise\Api\V4\Clients\Merge\From\Ids\Item\To;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\V4\Clients\Merge\From\Ids\Item\To\Id\IdRequestBuilder;

/**
 * Builds and executes requests for operations under /clients/merge/from/ids/{fromClientIds}/to
*/
class ToRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The id property
    */
    public function id(): IdRequestBuilder {
        return new IdRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new ToRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/clients/merge/from/ids/{fromClientIds}/to');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
