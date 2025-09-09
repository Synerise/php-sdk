<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Item;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\RecommendationCampaigns\Models\Error;
use Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Item\Copy\CopyRequestBuilder;
use Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Item\Item\WithStateItemRequestBuilder;

/**
 * Builds and executes requests for operations under /recommendations/v2/campaigns/{campaignId}
*/
class WithCampaignItemRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The copy property
    */
    public function copy(): CopyRequestBuilder {
        return new CopyRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Gets an item from the Synerise/Api/RecommendationCampaigns.recommendations.v2.campaigns.item.item collection
     * @param string $state The new state
     * @return WithStateItemRequestBuilder
    */
    public function byState(string $state): WithStateItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['state'] = $state;
        return new WithStateItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new WithCampaignItemRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/recommendations/v2/campaigns/{campaignId}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Delete a recommendation campaign. This operation is irreversible.
     * @param WithCampaignItemRequestBuilderDeleteRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<RecommendationCampaignDefinitionV2|null>
     * @throws Exception
    */
    public function delete(?WithCampaignItemRequestBuilderDeleteRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toDeleteRequestInformation($requestConfiguration);
        $errorMappings = [
                '404' => [Error::class, 'createFromDiscriminatorValue'],
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [RecommendationCampaignDefinitionV2::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Retrieve the details of a single campaign.
     * @param WithCampaignItemRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<RecommendationCampaignDefinitionV2|null>
     * @throws Exception
    */
    public function get(?WithCampaignItemRequestBuilderGetRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toGetRequestInformation($requestConfiguration);
        $errorMappings = [
                '404' => [Error::class, 'createFromDiscriminatorValue'],
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [RecommendationCampaignDefinitionV2::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Update a recommendation campaign by changing the parameters or copying the definition from another campaign.When you copy from another campaign:- the following campaign data is NOT updated:  - `title`  - `state`  - `start_date`  - `end_date`  - `campaignId`  - `createdAt`- `modified_by_user_id` changes to the user who performed the update
     * @param RecommendationCampaignUpdateRequest $body The request body
     * @param WithCampaignItemRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<RecommendationCampaignDefinitionV2|null>
     * @throws Exception
    */
    public function post(RecommendationCampaignUpdateRequest $body, ?WithCampaignItemRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '404' => [Error::class, 'createFromDiscriminatorValue'],
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [RecommendationCampaignDefinitionV2::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Delete a recommendation campaign. This operation is irreversible.
     * @param WithCampaignItemRequestBuilderDeleteRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toDeleteRequestInformation(?WithCampaignItemRequestBuilderDeleteRequestConfiguration $requestConfiguration = null): RequestInformation {
        $requestInfo = new RequestInformation();
        $requestInfo->urlTemplate = $this->urlTemplate;
        $requestInfo->pathParameters = $this->pathParameters;
        $requestInfo->httpMethod = HttpMethod::DELETE;
        if ($requestConfiguration !== null) {
            $requestInfo->addHeaders($requestConfiguration->headers);
            $requestInfo->addRequestOptions(...$requestConfiguration->options);
        }
        $requestInfo->tryAddHeader('Accept', "application/json");
        return $requestInfo;
    }

    /**
     * Retrieve the details of a single campaign.
     * @param WithCampaignItemRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toGetRequestInformation(?WithCampaignItemRequestBuilderGetRequestConfiguration $requestConfiguration = null): RequestInformation {
        $requestInfo = new RequestInformation();
        $requestInfo->urlTemplate = $this->urlTemplate;
        $requestInfo->pathParameters = $this->pathParameters;
        $requestInfo->httpMethod = HttpMethod::GET;
        if ($requestConfiguration !== null) {
            $requestInfo->addHeaders($requestConfiguration->headers);
            $requestInfo->addRequestOptions(...$requestConfiguration->options);
        }
        $requestInfo->tryAddHeader('Accept', "application/json");
        return $requestInfo;
    }

    /**
     * Update a recommendation campaign by changing the parameters or copying the definition from another campaign.When you copy from another campaign:- the following campaign data is NOT updated:  - `title`  - `state`  - `start_date`  - `end_date`  - `campaignId`  - `createdAt`- `modified_by_user_id` changes to the user who performed the update
     * @param RecommendationCampaignUpdateRequest $body The request body
     * @param WithCampaignItemRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(RecommendationCampaignUpdateRequest $body, ?WithCampaignItemRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * @return WithCampaignItemRequestBuilder
    */
    public function withUrl(string $rawUrl): WithCampaignItemRequestBuilder {
        return new WithCampaignItemRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
