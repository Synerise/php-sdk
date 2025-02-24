<?php

namespace Synerise\Api\V4\Clients\Merge\From\CustomIds\Item\To\CustomId;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\V4\Clients\Merge\From\CustomIds\Item\To\CustomId\Item\WithTargetCustomItemRequestBuilder;

/**
 * Builds and executes requests for operations under /clients/merge/from/custom-ids/{sourceCustomIDs}/to/custom-id
*/
class CustomIdRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Gets an item from the Synerise/Api/V4.clients.merge.from.customIds.item.to.customId.item collection
     * @param string $targetCustomID The custom ID of the profile to merge the `sourceCustomIDs` into
     * @return WithTargetCustomItemRequestBuilder
    */
    public function byTargetCustomID(string $targetCustomID): WithTargetCustomItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['targetCustomID'] = $targetCustomID;
        return new WithTargetCustomItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new CustomIdRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/clients/merge/from/custom-ids/{sourceCustomIDs}/to/custom-id');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
