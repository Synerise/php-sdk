<?php

namespace Synerise\Api\SearchConfig\Search\V2\SuggestionIndices\Item;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\SearchConfig\Search\V2\SuggestionIndices\Item\Config\ConfigRequestBuilder;
use Synerise\Api\SearchConfig\Search\V2\SuggestionIndices\Item\State\StateRequestBuilder;

/**
 * Builds and executes requests for operations under /search/v2/suggestion-indices/{indexId}
*/
class WithIndexItemRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The config property
    */
    public function config(): ConfigRequestBuilder {
        return new ConfigRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The state property
    */
    public function state(): StateRequestBuilder {
        return new StateRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new WithIndexItemRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/search/v2/suggestion-indices/{indexId}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
