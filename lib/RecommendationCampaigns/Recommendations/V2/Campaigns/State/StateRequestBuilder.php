<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\State;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\RecommendationCampaigns\Models\Error;
use Synerise\Api\RecommendationCampaigns\Models\RecommendationStateChangeRequestV2;

/**
 * Builds and executes requests for operations under /recommendations/v2/campaigns/state
*/
class StateRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Instantiates a new StateRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/recommendations/v2/campaigns/state');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Change the status of one or more campaigns.
     * @param RecommendationStateChangeRequestV2 $body The request body
     * @param StateRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<array<string>|null>
     * @throws Exception
    */
    public function post(RecommendationStateChangeRequestV2 $body, ?StateRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        /** @var Promise<array<string>|null> $result */
        $result = $this->requestAdapter->sendPrimitiveCollectionAsync($requestInfo, 'string', $errorMappings);
        return $result;
    }

    /**
     * Change the status of one or more campaigns.
     * @param RecommendationStateChangeRequestV2 $body The request body
     * @param StateRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(RecommendationStateChangeRequestV2 $body, ?StateRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * @return StateRequestBuilder
    */
    public function withUrl(string $rawUrl): StateRequestBuilder {
        return new StateRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
