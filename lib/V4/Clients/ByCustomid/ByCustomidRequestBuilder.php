<?php

namespace Synerise\Api\V4\Clients\ByCustomid;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\V4\Clients\ByCustomid\Item\WithCustomItemRequestBuilder;

/**
 * Builds and executes requests for operations under /clients/by-customid
*/
class ByCustomidRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Gets an item from the Synerise/Api/V4.clients.byCustomid.item collection
     * @param string $customId The custom ID of the profile
     * @return WithCustomItemRequestBuilder
    */
    public function byCustomId(string $customId): WithCustomItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['customId'] = $customId;
        return new WithCustomItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new ByCustomidRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/clients/by-customid');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
