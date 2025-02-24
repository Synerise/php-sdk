<?php

namespace Synerise\Api\SearchConfig\Search\V2;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\SearchConfig\Search\V2\Catalogs\CatalogsRequestBuilder;
use Synerise\Api\SearchConfig\Search\V2\Indices\IndicesRequestBuilder;
use Synerise\Api\SearchConfig\Search\V2\SuggestionIndices\SuggestionIndicesRequestBuilder;
use Synerise\Api\SearchConfig\Search\V2\SupportedLanguages\SupportedLanguagesRequestBuilder;

/**
 * Builds and executes requests for operations under /search/v2
*/
class V2RequestBuilder extends BaseRequestBuilder 
{
    /**
     * The catalogs property
    */
    public function catalogs(): CatalogsRequestBuilder {
        return new CatalogsRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The indices property
    */
    public function indices(): IndicesRequestBuilder {
        return new IndicesRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The suggestionIndices property
    */
    public function suggestionIndices(): SuggestionIndicesRequestBuilder {
        return new SuggestionIndicesRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The supportedLanguages property
    */
    public function supportedLanguages(): SupportedLanguagesRequestBuilder {
        return new SupportedLanguagesRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new V2RequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/search/v2');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
