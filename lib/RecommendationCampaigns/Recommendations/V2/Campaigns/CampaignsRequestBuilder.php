<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\RecommendationCampaigns\Models\Error;
use Synerise\Api\RecommendationCampaigns\Models\RecommendationCampaignsResponseV2;
use Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Batch\BatchRequestBuilder;
use Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Directories\DirectoriesRequestBuilder;
use Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Item\WithCampaignItemRequestBuilder;
use Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Simplified\SimplifiedRequestBuilder;
use Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Slugs\SlugsRequestBuilder;
use Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\State\StateRequestBuilder;

/**
 * Builds and executes requests for operations under /recommendations/v2/campaigns
*/
class CampaignsRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The batch property
    */
    public function batch(): BatchRequestBuilder {
        return new BatchRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The directories property
    */
    public function directories(): DirectoriesRequestBuilder {
        return new DirectoriesRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The simplified property
    */
    public function simplified(): SimplifiedRequestBuilder {
        return new SimplifiedRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The slugs property
    */
    public function slugs(): SlugsRequestBuilder {
        return new SlugsRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The state property
    */
    public function state(): StateRequestBuilder {
        return new StateRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Gets an item from the Synerise/Api/RecommendationCampaigns.recommendations.v2.campaigns.item collection
     * @param string $campaignId ID of the campaign
     * @return WithCampaignItemRequestBuilder
    */
    public function byCampaignId(string $campaignId): WithCampaignItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['campaignId'] = $campaignId;
        return new WithCampaignItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new CampaignsRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/recommendations/v2/campaigns{?includeMeta*,limit*,ordering*,page*,search*,sortBy*,state*,type*}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Fetch all recommendation campaigns.
     * @param CampaignsRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<RecommendationCampaignsResponseV2|null>
     * @throws Exception
    */
    public function get(?CampaignsRequestBuilderGetRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toGetRequestInformation($requestConfiguration);
        $errorMappings = [
                '404' => [Error::class, 'createFromDiscriminatorValue'],
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [RecommendationCampaignsResponseV2::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Create a new recommendation campaign.
     * @param CampaignsPostRequestBody $body The request body
     * @param CampaignsRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<RecommendationCampaignDefinitionV2|null>
     * @throws Exception
    */
    public function post(CampaignsPostRequestBody $body, ?CampaignsRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [RecommendationCampaignDefinitionV2::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Fetch all recommendation campaigns.
     * @param CampaignsRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toGetRequestInformation(?CampaignsRequestBuilderGetRequestConfiguration $requestConfiguration = null): RequestInformation {
        $requestInfo = new RequestInformation();
        $requestInfo->urlTemplate = $this->urlTemplate;
        $requestInfo->pathParameters = $this->pathParameters;
        $requestInfo->httpMethod = HttpMethod::GET;
        if ($requestConfiguration !== null) {
            $requestInfo->addHeaders($requestConfiguration->headers);
            if ($requestConfiguration->queryParameters !== null) {
                $requestInfo->setQueryParameters($requestConfiguration->queryParameters);
            }
            $requestInfo->addRequestOptions(...$requestConfiguration->options);
        }
        $requestInfo->tryAddHeader('Accept', "application/json");
        return $requestInfo;
    }

    /**
     * Create a new recommendation campaign.
     * @param CampaignsPostRequestBody $body The request body
     * @param CampaignsRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(CampaignsPostRequestBody $body, ?CampaignsRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
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
