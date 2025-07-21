<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Simplified;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\RecommendationCampaigns\Models\Error;
use Synerise\Api\RecommendationCampaigns\Models\SimpleRecommendationCampaignsV2;

/**
 * Builds and executes requests for operations under /recommendations/v2/campaigns/simplified
*/
class SimplifiedRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Instantiates a new SimplifiedRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/recommendations/v2/campaigns/simplified{?state*,type*}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Fetch simplified recommendation campaign data.
     * @param SimplifiedRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<array<SimpleRecommendationCampaignsV2>|null>
     * @throws Exception
    */
    public function get(?SimplifiedRequestBuilderGetRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toGetRequestInformation($requestConfiguration);
        $errorMappings = [
                '404' => [Error::class, 'createFromDiscriminatorValue'],
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendCollectionAsync($requestInfo, [SimpleRecommendationCampaignsV2::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Fetch simplified recommendation campaign data.
     * @param SimplifiedRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toGetRequestInformation(?SimplifiedRequestBuilderGetRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * Returns a request builder with the provided arbitrary URL. Using this method means any other path or query parameters are ignored.
     * @param string $rawUrl The raw URL to use for the request builder.
     * @return SimplifiedRequestBuilder
    */
    public function withUrl(string $rawUrl): SimplifiedRequestBuilder {
        return new SimplifiedRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
