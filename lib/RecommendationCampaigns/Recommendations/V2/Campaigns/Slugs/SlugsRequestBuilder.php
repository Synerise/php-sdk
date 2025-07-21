<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Slugs;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Slugs\Item\WithSlugItemRequestBuilder;

/**
 * Builds and executes requests for operations under /recommendations/v2/campaigns/slugs
*/
class SlugsRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Gets an item from the Synerise/Api/RecommendationCampaigns.recommendations.v2.campaigns.slugs.item collection
     * @param string $slug slug of the campaign
     * @return WithSlugItemRequestBuilder
    */
    public function bySlug(string $slug): WithSlugItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['slug'] = $slug;
        return new WithSlugItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new SlugsRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/recommendations/v2/campaigns/slugs');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
