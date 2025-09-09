<?php

namespace Synerise\Api\RecommendationCampaigns\RecommendationCampaigns;

use Microsoft\Kiota\Abstractions\ApiClientBuilder;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\RecommendationCampaigns\Recommendations\RecommendationsRequestBuilder;

/**
 * The main entry point of the SDK, exposes the configuration and the fluent API.
*/
class RecommendationCampaigns extends BaseRequestBuilder 
{
    /**
     * The recommendationCampaigns property
    */
    public function recommendationCampaigns(): RecommendationCampaignsRequestBuilder {
        return new RecommendationCampaignsRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The recommendations property
    */
    public function recommendations(): RecommendationsRequestBuilder {
        return new RecommendationsRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new RecommendationCampaigns and sets the default values.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct(RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}');
    }

}
