<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Slugs\Item;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\RecommendationCampaigns\Models\Error;

/**
 * Builds and executes requests for operations under /recommendations/v2/campaigns/slugs/{slug}
*/
class WithSlugItemRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Instantiates a new WithSlugItemRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/recommendations/v2/campaigns/slugs/{slug}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Retrieve the details of a single campaign by slug.
     * @param WithSlugItemRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<RecommendationCampaignDefinitionV2|null>
     * @throws Exception
    */
    public function get(?WithSlugItemRequestBuilderGetRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toGetRequestInformation($requestConfiguration);
        $errorMappings = [
                '404' => [Error::class, 'createFromDiscriminatorValue'],
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [RecommendationCampaignDefinitionV2::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Retrieve the details of a single campaign by slug.
     * @param WithSlugItemRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toGetRequestInformation(?WithSlugItemRequestBuilderGetRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * Returns a request builder with the provided arbitrary URL. Using this method means any other path or query parameters are ignored.
     * @param string $rawUrl The raw URL to use for the request builder.
     * @return WithSlugItemRequestBuilder
    */
    public function withUrl(string $rawUrl): WithSlugItemRequestBuilder {
        return new WithSlugItemRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
