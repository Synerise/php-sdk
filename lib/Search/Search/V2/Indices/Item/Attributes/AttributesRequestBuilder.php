<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\Attributes;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\Search\Search\V2\Indices\Item\Attributes\Filterable\FilterableRequestBuilder;

/**
 * Builds and executes requests for operations under /search/v2/indices/{indexId}/attributes
*/
class AttributesRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The filterable property
    */
    public function filterable(): FilterableRequestBuilder {
        return new FilterableRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new AttributesRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/search/v2/indices/{indexId}/attributes');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
