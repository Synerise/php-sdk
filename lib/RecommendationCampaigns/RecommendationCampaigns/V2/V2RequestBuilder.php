<?php

namespace Synerise\Api\RecommendationCampaigns\RecommendationCampaigns\V2;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\RecommendationCampaigns\RecommendationCampaigns\V2\Healthcheck\HealthcheckRequestBuilder;

/**
 * Builds and executes requests for operations under /recommendation-campaigns/v2
*/
class V2RequestBuilder extends BaseRequestBuilder 
{
    /**
     * The healthcheck property
    */
    public function healthcheck(): HealthcheckRequestBuilder {
        return new HealthcheckRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new V2RequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/recommendation-campaigns/v2');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
