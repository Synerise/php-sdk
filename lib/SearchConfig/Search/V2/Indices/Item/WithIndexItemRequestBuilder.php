<?php

namespace Synerise\Api\SearchConfig\Search\V2\Indices\Item;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\SearchConfig\Search\V2\Indices\Item\Config\ConfigRequestBuilder;
use Synerise\Api\SearchConfig\Search\V2\Indices\Item\Copy\CopyRequestBuilder;
use Synerise\Api\SearchConfig\Search\V2\Indices\Item\Dependencies\DependenciesRequestBuilder;
use Synerise\Api\SearchConfig\Search\V2\Indices\Item\Duplicate\DuplicateRequestBuilder;
use Synerise\Api\SearchConfig\Search\V2\Indices\Item\State\StateRequestBuilder;

/**
 * Builds and executes requests for operations under /search/v2/indices/{indexId}
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
     * The copy property
    */
    public function copy(): CopyRequestBuilder {
        return new CopyRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The dependencies property
    */
    public function dependencies(): DependenciesRequestBuilder {
        return new DependenciesRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The duplicate property
    */
    public function duplicate(): DuplicateRequestBuilder {
        return new DuplicateRequestBuilder($this->pathParameters, $this->requestAdapter);
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
        parent::__construct($requestAdapter, [], '{+baseurl}/search/v2/indices/{indexId}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
