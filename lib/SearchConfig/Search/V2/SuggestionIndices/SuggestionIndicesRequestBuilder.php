<?php

namespace Synerise\Api\SearchConfig\Search\V2\SuggestionIndices;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\SearchConfig\Models\Error;
use Synerise\Api\SearchConfig\Models\GetSuggestionIndicesResponseSchema;
use Synerise\Api\SearchConfig\Models\SuggestionIndexSchema;
use Synerise\Api\SearchConfig\Search\V2\SuggestionIndices\Item\WithIndexItemRequestBuilder;

/**
 * Builds and executes requests for operations under /search/v2/suggestion-indices
*/
class SuggestionIndicesRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Gets an item from the Synerise/Api/SearchConfig.search.v2.suggestionIndices.item collection
     * @param string $indexId ID of the index
     * @return WithIndexItemRequestBuilder
    */
    public function byIndexId(string $indexId): WithIndexItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['indexId'] = $indexId;
        return new WithIndexItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new SuggestionIndicesRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/search/v2/suggestion-indices{?includeMeta*,limit*,name*,ordering*,page*,query*,sortBy*}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Retrieve a list of all suggestion index configurations in the workspace.
     * @param SuggestionIndicesRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<GetSuggestionIndicesResponseSchema|null>
     * @throws Exception
    */
    public function get(?SuggestionIndicesRequestBuilderGetRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toGetRequestInformation($requestConfiguration);
        $errorMappings = [
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [GetSuggestionIndicesResponseSchema::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Create a suggestion index configuration.
     * @param SuggestionIndicesPostRequestBody $body The request body
     * @param SuggestionIndicesRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<SuggestionIndexSchema|null>
     * @throws Exception
    */
    public function post(SuggestionIndicesPostRequestBody $body, ?SuggestionIndicesRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [SuggestionIndexSchema::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Retrieve a list of all suggestion index configurations in the workspace.
     * @param SuggestionIndicesRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toGetRequestInformation(?SuggestionIndicesRequestBuilderGetRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * Create a suggestion index configuration.
     * @param SuggestionIndicesPostRequestBody $body The request body
     * @param SuggestionIndicesRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(SuggestionIndicesPostRequestBody $body, ?SuggestionIndicesRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * @return SuggestionIndicesRequestBuilder
    */
    public function withUrl(string $rawUrl): SuggestionIndicesRequestBuilder {
        return new SuggestionIndicesRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
