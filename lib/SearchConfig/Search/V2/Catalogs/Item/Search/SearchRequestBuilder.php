<?php

namespace Synerise\Api\SearchConfig\Search\V2\Catalogs\Item\Search;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\SearchConfig\Search\V2\Catalogs\Item\Search\Item\WithStateOperationItemRequestBuilder;
use Synerise\Api\SearchConfig\Search\V2\Catalogs\Item\Search\State\StateRequestBuilder;

/**
 * Builds and executes requests for operations under /search/v2/catalogs/{itemsCatalogId}/search
*/
class SearchRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The state property
    */
    public function state(): StateRequestBuilder {
        return new StateRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Gets an item from the Synerise/Api/SearchConfig.search.v2.catalogs.item.search.item collection
     * @param string $stateOperation Operation to change state of items catalog for search
     * @return WithStateOperationItemRequestBuilder
    */
    public function byStateOperation(string $stateOperation): WithStateOperationItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['stateOperation'] = $stateOperation;
        return new WithStateOperationItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new SearchRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/search/v2/catalogs/{itemsCatalogId}/search');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
