<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\EscapedList;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\Search\Models\Error;
use Synerise\Api\Search\Models\ListingResponse;
use Synerise\Api\Search\Search\V2\Indices\Item\EscapedList\Explain\ExplainRequestBuilder;

/**
 * Builds and executes requests for operations under /search/v2/indices/{indexId}/list
*/
class ListRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The explain property
    */
    public function explain(): ExplainRequestBuilder {
        return new ExplainRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new ListRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/search/v2/indices/{indexId}/list{?caseSensitiveFacetValues*,clientUUID*,context*,correlationId*,displayAttributes*,distinctFilter*,excludeQueryRules*,facets*,facetsSize*,filterAroundRadius*,filterGeoPoints*,filters*,ignoreQueryRules*,includeFacets*,includeMeta*,limit*,maxValuesPerFacet*,ordering*,page*,personalize*,searchId*,sortBy*,sortByGeoPoint*,sortByMetric*}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Retrieves item listing, which is a search without a query. The results can be filtered and sorted.
     * @param ListRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<ListingResponse|null>
     * @throws Exception
    */
    public function get(?ListRequestBuilderGetRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toGetRequestInformation($requestConfiguration);
        $errorMappings = [
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [ListingResponse::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Retrieves item listing, which is a search without a query. The results can be filtered and sorted.
     * @param ListPostRequestBody $body The request body
     * @param ListRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<ListingResponse|null>
     * @throws Exception
    */
    public function post(ListPostRequestBody $body, ?ListRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [ListingResponse::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Retrieves item listing, which is a search without a query. The results can be filtered and sorted.
     * @param ListRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toGetRequestInformation(?ListRequestBuilderGetRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * Retrieves item listing, which is a search without a query. The results can be filtered and sorted.
     * @param ListPostRequestBody $body The request body
     * @param ListRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(ListPostRequestBody $body, ?ListRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * @return ListRequestBuilder
    */
    public function withUrl(string $rawUrl): ListRequestBuilder {
        return new ListRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
