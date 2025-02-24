<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\Attributes\Filterable;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\Search\Search\V2\Indices\Item\Attributes\Filterable\Values\ValuesRequestBuilder;

/**
 * Builds and executes requests for operations under /search/v2/indices/{indexId}/attributes/filterable
*/
class FilterableRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The values property
    */
    public function values(): ValuesRequestBuilder {
        return new ValuesRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new FilterableRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/search/v2/indices/{indexId}/attributes/filterable');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
