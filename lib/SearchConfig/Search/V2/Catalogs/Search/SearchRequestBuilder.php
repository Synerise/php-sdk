<?php

namespace Synerise\Api\SearchConfig\Search\V2\Catalogs\Search;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\SearchConfig\Search\V2\Catalogs\Search\States\StatesRequestBuilder;

/**
 * Builds and executes requests for operations under /search/v2/catalogs/search
*/
class SearchRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The states property
    */
    public function states(): StatesRequestBuilder {
        return new StatesRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new SearchRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/search/v2/catalogs/search');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
