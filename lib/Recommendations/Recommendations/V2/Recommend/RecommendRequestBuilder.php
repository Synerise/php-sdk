<?php

namespace Synerise\Api\Recommendations\Recommendations\V2\Recommend;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\Recommendations\Recommendations\V2\Recommend\Campaigns\CampaignsRequestBuilder;

/**
 * Builds and executes requests for operations under /recommendations/v2/recommend
*/
class RecommendRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The campaigns property
    */
    public function campaigns(): CampaignsRequestBuilder {
        return new CampaignsRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new RecommendRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/recommendations/v2/recommend');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
