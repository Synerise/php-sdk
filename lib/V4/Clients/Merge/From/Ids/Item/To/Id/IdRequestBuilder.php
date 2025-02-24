<?php

namespace Synerise\Api\V4\Clients\Merge\From\Ids\Item\To\Id;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\V4\Clients\Merge\From\Ids\Item\To\Id\Item\WithToClientItemRequestBuilder;

/**
 * Builds and executes requests for operations under /clients/merge/from/ids/{fromClientIds}/to/id
*/
class IdRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Gets an item from the Synerise/Api/V4.clients.merge.from.ids.item.to.id.item collection
     * @param int $toClientId The ID of the profile to merge the `fromClientIds` into
     * @return WithToClientItemRequestBuilder
    */
    public function byToClientId(int $toClientId): WithToClientItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['toClientId'] = $toClientId;
        return new WithToClientItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new IdRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/clients/merge/from/ids/{fromClientIds}/to/id');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
