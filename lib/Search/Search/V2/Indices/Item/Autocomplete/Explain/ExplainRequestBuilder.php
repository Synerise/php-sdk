<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\Autocomplete\Explain;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\Search\Models\Error;

/**
 * Builds and executes requests for operations under /search/v2/indices/{indexId}/autocomplete/explain
*/
class ExplainRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Instantiates a new ExplainRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/search/v2/indices/{indexId}/autocomplete/explain?query={query}{&caseSensitiveFacetValues*,clientUUID*,context*,displayAttributes*,distinctFilter*,excludeQueryRules*,facets*,facetsSize*,filterAroundRadius*,filterGeoPoints*,filters*,ignoreQueryRules*,includeFacets*,includeMeta*,limit*,maxValuesPerFacet*,ordering*,page*,personalize*,sortBy*,sortByGeoPoint*,sortByMetric*}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Retrieves items that match a query from a search index or a suggestion index. The results can be filtered and sorted. The results of this search type are not cached. The response contains search explanation.
     * @param ExplainRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<ExplainGetResponse|null>
     * @throws Exception
    */
    public function get(?ExplainRequestBuilderGetRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toGetRequestInformation($requestConfiguration);
        $errorMappings = [
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [ExplainGetResponse::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Retrieves items that match a query from a search index or a suggestion index. The results can be filtered and sorted. The results of this search type are not cached. The response contains search explanation.
     * @param ExplainPostRequestBody $body The request body
     * @param ExplainRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<ExplainPostResponse|null>
     * @throws Exception
    */
    public function post(ExplainPostRequestBody $body, ?ExplainRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [ExplainPostResponse::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Retrieves items that match a query from a search index or a suggestion index. The results can be filtered and sorted. The results of this search type are not cached. The response contains search explanation.
     * @param ExplainRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toGetRequestInformation(?ExplainRequestBuilderGetRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * Retrieves items that match a query from a search index or a suggestion index. The results can be filtered and sorted. The results of this search type are not cached. The response contains search explanation.
     * @param ExplainPostRequestBody $body The request body
     * @param ExplainRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(ExplainPostRequestBody $body, ?ExplainRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
        $requestInfo = new RequestInformation();
        $requestInfo->urlTemplate = '{+baseurl}/search/v2/indices/{indexId}/autocomplete/explain';
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
     * @return ExplainRequestBuilder
    */
    public function withUrl(string $rawUrl): ExplainRequestBuilder {
        return new ExplainRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
