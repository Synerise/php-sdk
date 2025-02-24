<?php

namespace Synerise\Api\SearchConfig\Search\V2\Catalogs;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\SearchConfig\Search\V2\Catalogs\Item\WithItemsCatalogItemRequestBuilder;
use Synerise\Api\SearchConfig\Search\V2\Catalogs\Search\SearchRequestBuilder;

/**
 * Builds and executes requests for operations under /search/v2/catalogs
*/
class CatalogsRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The search property
    */
    public function search(): SearchRequestBuilder {
        return new SearchRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Gets an item from the Synerise/Api/SearchConfig.search.v2.catalogs.item collection
     * @param string $itemsCatalogId Items catalog id
     * @return WithItemsCatalogItemRequestBuilder
    */
    public function byItemsCatalogId(string $itemsCatalogId): WithItemsCatalogItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['itemsCatalogId'] = $itemsCatalogId;
        return new WithItemsCatalogItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new CatalogsRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/search/v2/catalogs');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
