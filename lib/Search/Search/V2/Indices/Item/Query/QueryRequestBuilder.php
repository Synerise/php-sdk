<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\Query;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\Search\Models\Error;
use Synerise\Api\Search\Search\V2\Indices\Item\Query\Explain\ExplainRequestBuilder;

/**
 * Builds and executes requests for operations under /search/v2/indices/{indexId}/query
*/
class QueryRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The explain property
    */
    public function explain(): ExplainRequestBuilder {
        return new ExplainRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new QueryRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/search/v2/indices/{indexId}/query?query={query}{&caseSensitiveFacetValues*,clientUUID*,context*,correlationId*,displayAttributes*,distinctFilter*,excludeQueryRules*,facets*,facetsSize*,filterAroundRadius*,filterGeoPoints*,filters*,ignoreQueryRules*,includeFacets*,includeMeta*,limit*,maxValuesPerFacet*,ordering*,page*,personalize*,searchId*,sortBy*,sortByGeoPoint*,sortByMetric*}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Retrieves items that match a full-text query from a search index or a suggestion index. The results can be filtered and sorted.
     * @param QueryRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<QueryGetResponse|null>
     * @throws Exception
    */
    public function get(?QueryRequestBuilderGetRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toGetRequestInformation($requestConfiguration);
        $errorMappings = [
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [QueryGetResponse::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Retrieves items that match a full-text query from a search index or a suggestion index. The results can be filtered and sorted.
     * @param QueryPostRequestBody $body The request body
     * @param QueryRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<QueryPostResponse|null>
     * @throws Exception
    */
    public function post(QueryPostRequestBody $body, ?QueryRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [QueryPostResponse::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Retrieves items that match a full-text query from a search index or a suggestion index. The results can be filtered and sorted.
     * @param QueryRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toGetRequestInformation(?QueryRequestBuilderGetRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * Retrieves items that match a full-text query from a search index or a suggestion index. The results can be filtered and sorted.
     * @param QueryPostRequestBody $body The request body
     * @param QueryRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(QueryPostRequestBody $body, ?QueryRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
        $requestInfo = new RequestInformation();
        $requestInfo->urlTemplate = '{+baseurl}/search/v2/indices/{indexId}/query';
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
     * @return QueryRequestBuilder
    */
    public function withUrl(string $rawUrl): QueryRequestBuilder {
        return new QueryRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
