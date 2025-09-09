<?php

namespace Synerise\Api\Recommendations\Recommendations\V2\Recommend\Campaigns\Item\By\Item;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\Recommendations\Models\Error;
use Synerise\Api\Recommendations\Models\PostRecommendationsWithIdentifierValueRequest;
use Synerise\Api\Recommendations\Models\RecommendationResponseSchemaV2Materializer;

/**
 * Builds and executes requests for operations under /recommendations/v2/recommend/campaigns/{campaignIdentifier}/by/{identifierName}
*/
class WithIdentifierNameItemRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Instantiates a new WithIdentifierNameItemRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/recommendations/v2/recommend/campaigns/{campaignIdentifier}/by/{identifierName}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * **Before you use this method**: you must [create a recommendations campaign in Synerise](https://help.synerise.com/docs/campaign/recommendations-v2/). All the recommendation filters and parameters will be handled for you automatically according to a campaign's configuration.The method allows you to retrieve recommendations based on a campaignID or a slug, profile's identifier name (the value of the identifier is provided in the request body), and a context. The context is built based on:- campaign identifier (required)- identifierName (required)- identifierValue (required)- items (for example, items currently in the basket)- item exclusions
     * @param PostRecommendationsWithIdentifierValueRequest $body The request body
     * @param WithIdentifierNameItemRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<RecommendationResponseSchemaV2Materializer|null>
     * @throws Exception
    */
    public function post(PostRecommendationsWithIdentifierValueRequest $body, ?WithIdentifierNameItemRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '404' => [Error::class, 'createFromDiscriminatorValue'],
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [RecommendationResponseSchemaV2Materializer::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * **Before you use this method**: you must [create a recommendations campaign in Synerise](https://help.synerise.com/docs/campaign/recommendations-v2/). All the recommendation filters and parameters will be handled for you automatically according to a campaign's configuration.The method allows you to retrieve recommendations based on a campaignID or a slug, profile's identifier name (the value of the identifier is provided in the request body), and a context. The context is built based on:- campaign identifier (required)- identifierName (required)- identifierValue (required)- items (for example, items currently in the basket)- item exclusions
     * @param PostRecommendationsWithIdentifierValueRequest $body The request body
     * @param WithIdentifierNameItemRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(PostRecommendationsWithIdentifierValueRequest $body, ?WithIdentifierNameItemRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * @return WithIdentifierNameItemRequestBuilder
    */
    public function withUrl(string $rawUrl): WithIdentifierNameItemRequestBuilder {
        return new WithIdentifierNameItemRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
