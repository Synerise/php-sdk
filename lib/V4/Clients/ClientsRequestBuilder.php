<?php

namespace Synerise\Api\V4\Clients;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\V4\Clients\Batch\BatchRequestBuilder;
use Synerise\Api\V4\Clients\ByCustomid\ByCustomidRequestBuilder;
use Synerise\Api\V4\Clients\ByEmail\ByEmailRequestBuilder;
use Synerise\Api\V4\Clients\CustomImport\CustomImportRequestBuilder;
use Synerise\Api\V4\Clients\Instant\InstantRequestBuilder;
use Synerise\Api\V4\Clients\Item\ClientItemRequestBuilder;
use Synerise\Api\V4\Clients\Merge\MergeRequestBuilder;
use Synerise\Api\V4\Clients\Tags\TagsRequestBuilder;
use Synerise\Api\V4\Models\HTTP400;
use Synerise\Api\V4\Models\InResponseClientDetails;

/**
 * Builds and executes requests for operations under /clients
*/
class ClientsRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The batch property
    */
    public function batch(): BatchRequestBuilder {
        return new BatchRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The byCustomid property
    */
    public function byCustomid(): ByCustomidRequestBuilder {
        return new ByCustomidRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The byEmail property
    */
    public function byEmail(): ByEmailRequestBuilder {
        return new ByEmailRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The customImport property
    */
    public function customImport(): CustomImportRequestBuilder {
        return new CustomImportRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The instant property
    */
    public function instant(): InstantRequestBuilder {
        return new InstantRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The merge property
    */
    public function merge(): MergeRequestBuilder {
        return new MergeRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The tags property
    */
    public function tags(): TagsRequestBuilder {
        return new TagsRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Gets an item from the Synerise/Api/V4.clients.item collection
     * @param int $clientId The ID of the profile
     * @return ClientItemRequestBuilder
    */
    public function byClientId(int $clientId): ClientItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['client%2Did'] = $clientId;
        return new ClientItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new ClientsRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/clients{?filters%5Banonymous%5D*,filters%5Bemail%5D*,filters%5BfirstName%5D*,filters%5BlastName%5D*,filters%5Bphone%5D*,pageIndex*,pageSize*,sortBy*,sortOrder*}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     *  Retrieve a list of Profiles. You can filter, sort, and paginate the results.
     * @param ClientsRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<array<InResponseClientDetails>|null>
     * @throws Exception
    */
    public function get(?ClientsRequestBuilderGetRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toGetRequestInformation($requestConfiguration);
        $errorMappings = [
                '400' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '401' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '403' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '415' => [HTTP400::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendCollectionAsync($requestInfo, [InResponseClientDetails::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Create a new profile in the Synerise application database. If you don't have some information about the profile, don't insert a null-value parameter - omit the parameter entirely.
     * @param ClientsPostRequestBody $body The request body
     * @param ClientsRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<void|null>
     * @throws Exception
    */
    public function post(ClientsPostRequestBody $body, ?ClientsRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '400' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '401' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '403' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '415' => [HTTP400::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendNoContentAsync($requestInfo, $errorMappings);
    }

    /**
     *  Retrieve a list of Profiles. You can filter, sort, and paginate the results.
     * @param ClientsRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toGetRequestInformation(?ClientsRequestBuilderGetRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * Create a new profile in the Synerise application database. If you don't have some information about the profile, don't insert a null-value parameter - omit the parameter entirely.
     * @param ClientsPostRequestBody $body The request body
     * @param ClientsRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(ClientsPostRequestBody $body, ?ClientsRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * @return ClientsRequestBuilder
    */
    public function withUrl(string $rawUrl): ClientsRequestBuilder {
        return new ClientsRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
