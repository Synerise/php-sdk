<?php

namespace Synerise\Api\Recommendations\Recommendations\V2\Recommend\Campaigns;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\Recommendations\Models\Error;
use Synerise\Api\Recommendations\Models\PostRecommendationsRequest;
use Synerise\Api\Recommendations\Models\RecommendationResponseSchemaV2Materializer;
use Synerise\Api\Recommendations\Recommendations\V2\Recommend\Campaigns\Item\WithCampaignIdentifierItemRequestBuilder;

/**
 * Builds and executes requests for operations under /recommendations/v2/recommend/campaigns
*/
class CampaignsRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Gets an item from the Synerise/Api/Recommendations.recommendations.v2.recommend.campaigns.item collection
     * @param string $campaignIdentifier Recommendation campaign identifier - a campaignID or a slug
     * @return WithCampaignIdentifierItemRequestBuilder
    */
    public function byCampaignIdentifier(string $campaignIdentifier): WithCampaignIdentifierItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['campaignIdentifier'] = $campaignIdentifier;
        return new WithCampaignIdentifierItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new CampaignsRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/recommendations/v2/recommend/campaigns');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * This method allows you to retrieve recommendations based on a campaignID or slug and a context. The context is built based on:- campaign ID or slug (one of those is required)- profile UUID- items (for example, items currently in the basket)- item exclusionsThis is the recommended and simplest way to fetch recommendations.Before you use this method, you must to create a recommendations campaign in Synerise. All the recommendation filters and parameters will be handled for you automatically according to a campaign's configuration.
     * @param PostRecommendationsRequest $body The request body
     * @param CampaignsRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<RecommendationResponseSchemaV2Materializer|null>
     * @throws Exception
    */
    public function post(PostRecommendationsRequest $body, ?CampaignsRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '404' => [Error::class, 'createFromDiscriminatorValue'],
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [RecommendationResponseSchemaV2Materializer::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * This method allows you to retrieve recommendations based on a campaignID or slug and a context. The context is built based on:- campaign ID or slug (one of those is required)- profile UUID- items (for example, items currently in the basket)- item exclusionsThis is the recommended and simplest way to fetch recommendations.Before you use this method, you must to create a recommendations campaign in Synerise. All the recommendation filters and parameters will be handled for you automatically according to a campaign's configuration.
     * @param PostRecommendationsRequest $body The request body
     * @param CampaignsRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(PostRecommendationsRequest $body, ?CampaignsRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
        $requestInfo = new RequestInformation();
        $requestInfo->urlTemplate = $this->urlTemplate;
        $requestInfo->pathParameters = $this->pathParameters;
        $requestInfo->httpMethod = HttpMethod::POST;
        if ($requestConfiguration !== null) {
            $requestInfo->addHeaders($requestConfiguration->headers);
            $requestInfo->addRequestOptions(...$requestConfiguration->options);
        }
        $requestInfo->tryAddHeader('Accept', "application/json");
        $requestInfo->setContentFromParsable($this->requestAdapter, "application/json", $body);
        return $requestInfo;
    }

    /**
     * Returns a request builder with the provided arbitrary URL. Using this method means any other path or query parameters are ignored.
     * @param string $rawUrl The raw URL to use for the request builder.
     * @return CampaignsRequestBuilder
    */
    public function withUrl(string $rawUrl): CampaignsRequestBuilder {
        return new CampaignsRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
