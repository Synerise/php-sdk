<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\Autocomplete;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\Search\Models\Error;
use Synerise\Api\Search\Search\V2\Indices\Item\Autocomplete\Explain\ExplainRequestBuilder;

/**
 * Builds and executes requests for operations under /search/v2/indices/{indexId}/autocomplete
*/
class AutocompleteRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The explain property
    */
    public function explain(): ExplainRequestBuilder {
        return new ExplainRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new AutocompleteRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/search/v2/indices/{indexId}/autocomplete?query={query}{&caseSensitiveFacetValues*,clientUUID*,context*,displayAttributes*,distinctFilter*,excludeQueryRules*,facets*,facetsSize*,filterAroundRadius*,filterGeoPoints*,filters*,ignoreQueryRules*,includeFacets*,includeMeta*,limit*,maxValuesPerFacet*,ordering*,page*,personalize*,sortBy*,sortByGeoPoint*,sortByMetric*}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Retrieves items that match a query from a search index or a suggestion index. The results can be filtered and sorted. The results of this search type are not cached.
     * @param AutocompleteRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<AutocompleteGetResponse|null>
     * @throws Exception
    */
    public function get(?AutocompleteRequestBuilderGetRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toGetRequestInformation($requestConfiguration);
        $errorMappings = [
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [AutocompleteGetResponse::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Retrieves items that match a query from a search index or a suggestion index. The results can be filtered and sorted. The results of this search type are not cached.
     * @param AutocompletePostRequestBody $body The request body
     * @param AutocompleteRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<AutocompletePostResponse|null>
     * @throws Exception
    */
    public function post(AutocompletePostRequestBody $body, ?AutocompleteRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [AutocompletePostResponse::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Retrieves items that match a query from a search index or a suggestion index. The results can be filtered and sorted. The results of this search type are not cached.
     * @param AutocompleteRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toGetRequestInformation(?AutocompleteRequestBuilderGetRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * Retrieves items that match a query from a search index or a suggestion index. The results can be filtered and sorted. The results of this search type are not cached.
     * @param AutocompletePostRequestBody $body The request body
     * @param AutocompleteRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(AutocompletePostRequestBody $body, ?AutocompleteRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
        $requestInfo = new RequestInformation();
        $requestInfo->urlTemplate = '{+baseurl}/search/v2/indices/{indexId}/autocomplete';
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
     * @return AutocompleteRequestBuilder
    */
    public function withUrl(string $rawUrl): AutocompleteRequestBuilder {
        return new AutocompleteRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
