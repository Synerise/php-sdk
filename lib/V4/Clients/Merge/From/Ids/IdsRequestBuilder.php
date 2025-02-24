<?php

namespace Synerise\Api\V4\Clients\Merge\From\Ids;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\V4\Clients\Merge\From\Ids\Item\WithFromClientIdsItemRequestBuilder;

/**
 * Builds and executes requests for operations under /clients/merge/from/ids
*/
class IdsRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Gets an item from the Synerise/Api/V4.clients.merge.from.ids.item collection
     * @param string $fromClientIds Comma-delimited string with client IDs of the profiles to merge
     * @return WithFromClientIdsItemRequestBuilder
    */
    public function byFromClientIds(string $fromClientIds): WithFromClientIdsItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['fromClientIds'] = $fromClientIds;
        return new WithFromClientIdsItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new IdsRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/clients/merge/from/ids');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
