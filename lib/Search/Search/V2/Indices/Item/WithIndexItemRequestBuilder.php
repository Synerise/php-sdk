<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\Search\Search\V2\Indices\Item\Attributes\AttributesRequestBuilder;
use Synerise\Api\Search\Search\V2\Indices\Item\Autocomplete\AutocompleteRequestBuilder;
use Synerise\Api\Search\Search\V2\Indices\Item\EscapedList\ListRequestBuilder;
use Synerise\Api\Search\Search\V2\Indices\Item\Query\QueryRequestBuilder;
use Synerise\Api\Search\Search\V2\Indices\Item\Visual\VisualRequestBuilder;

/**
 * Builds and executes requests for operations under /search/v2/indices/{indexId}
*/
class WithIndexItemRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The attributes property
    */
    public function attributes(): AttributesRequestBuilder {
        return new AttributesRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The autocomplete property
    */
    public function autocomplete(): AutocompleteRequestBuilder {
        return new AutocompleteRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The list property
    */
    public function escapedList(): ListRequestBuilder {
        return new ListRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The query property
    */
    public function query(): QueryRequestBuilder {
        return new QueryRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The visual property
    */
    public function visual(): VisualRequestBuilder {
        return new VisualRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new WithIndexItemRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/search/v2/indices/{indexId}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
