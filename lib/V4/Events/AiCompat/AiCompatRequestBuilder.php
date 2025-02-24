<?php

namespace Synerise\Api\V4\Events\AiCompat;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\V4\Events\AiCompat\Batch\BatchRequestBuilder;
use Synerise\Api\V4\Events\AiCompat\ItemSearchClick\ItemSearchClickRequestBuilder;
use Synerise\Api\V4\Events\AiCompat\RecommendationClick\RecommendationClickRequestBuilder;
use Synerise\Api\V4\Events\AiCompat\RecommendationView\RecommendationViewRequestBuilder;

/**
 * Builds and executes requests for operations under /events/ai-compat
*/
class AiCompatRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The batch property
    */
    public function batch(): BatchRequestBuilder {
        return new BatchRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The itemSearchClick property
    */
    public function itemSearchClick(): ItemSearchClickRequestBuilder {
        return new ItemSearchClickRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The recommendationClick property
    */
    public function recommendationClick(): RecommendationClickRequestBuilder {
        return new RecommendationClickRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The recommendationView property
    */
    public function recommendationView(): RecommendationViewRequestBuilder {
        return new RecommendationViewRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new AiCompatRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/events/ai-compat');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
