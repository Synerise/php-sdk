<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\CampaignsRequestBuilder;

/**
 * Builds and executes requests for operations under /recommendations/v2
*/
class V2RequestBuilder extends BaseRequestBuilder 
{
    /**
     * The campaigns property
    */
    public function campaigns(): CampaignsRequestBuilder {
        return new CampaignsRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new V2RequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/recommendations/v2');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
