<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Batch;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\RecommendationCampaigns\Models\DeleteCampaignBatchBody;
use Synerise\Api\RecommendationCampaigns\Models\DeleteCampaignBatchResponse;
use Synerise\Api\RecommendationCampaigns\Models\Error;

/**
 * Builds and executes requests for operations under /recommendations/v2/campaigns/batch
*/
class BatchRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Instantiates a new BatchRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/recommendations/v2/campaigns/batch');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Delete a batch of recommendation campaigns. This operation is irreversible.
     * @param DeleteCampaignBatchBody $body The request body
     * @param BatchRequestBuilderDeleteRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<DeleteCampaignBatchResponse|null>
     * @throws Exception
    */
    public function delete(DeleteCampaignBatchBody $body, ?BatchRequestBuilderDeleteRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toDeleteRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [DeleteCampaignBatchResponse::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Delete a batch of recommendation campaigns. This operation is irreversible.
     * @param DeleteCampaignBatchBody $body The request body
     * @param BatchRequestBuilderDeleteRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toDeleteRequestInformation(DeleteCampaignBatchBody $body, ?BatchRequestBuilderDeleteRequestConfiguration $requestConfiguration = null): RequestInformation {
        $requestInfo = new RequestInformation();
        $requestInfo->urlTemplate = $this->urlTemplate;
        $requestInfo->pathParameters = $this->pathParameters;
        $requestInfo->httpMethod = HttpMethod::DELETE;
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
     * @return BatchRequestBuilder
    */
    public function withUrl(string $rawUrl): BatchRequestBuilder {
        return new BatchRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
