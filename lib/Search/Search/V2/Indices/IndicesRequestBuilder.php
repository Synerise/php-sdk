<?php

namespace Synerise\Api\Search\Search\V2\Indices;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\Search\Search\V2\Indices\Item\WithIndexItemRequestBuilder;

/**
 * Builds and executes requests for operations under /search/v2/indices
*/
class IndicesRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Gets an item from the Synerise/Api/Search.search.v2.indices.item collection
     * @param string $indexId ID of the index to be used in the search operation
     * @return WithIndexItemRequestBuilder
    */
    public function byIndexId(string $indexId): WithIndexItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['indexId'] = $indexId;
        return new WithIndexItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new IndicesRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/search/v2/indices');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
