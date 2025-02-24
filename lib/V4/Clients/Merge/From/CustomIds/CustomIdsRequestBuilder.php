<?php

namespace Synerise\Api\V4\Clients\Merge\From\CustomIds;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\V4\Clients\Merge\From\CustomIds\Item\WithSourceCustomIDsItemRequestBuilder;

/**
 * Builds and executes requests for operations under /clients/merge/from/custom-ids
*/
class CustomIdsRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Gets an item from the Synerise/Api/V4.clients.merge.from.customIds.item collection
     * @param string $sourceCustomIDs Comma-delimited string with custom IDs of the profiles to merge
     * @return WithSourceCustomIDsItemRequestBuilder
    */
    public function bySourceCustomIDs(string $sourceCustomIDs): WithSourceCustomIDsItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['sourceCustomIDs'] = $sourceCustomIDs;
        return new WithSourceCustomIDsItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new CustomIdsRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/clients/merge/from/custom-ids');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
