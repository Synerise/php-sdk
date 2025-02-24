<?php

namespace Synerise\Api\V4\Clients\Batch;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\V4\Models\HTTP400;

/**
 * Builds and executes requests for operations under /clients/batch
*/
class BatchRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Instantiates a new BatchRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/clients/batch');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     *  Enqueue a number of add/update operations in the Synerise application database. <br/><br/>If you don't have some information about a profile, don't insert a null-value parameter - omit the parameter entirely. Sending a null value <strong>deletes an attribute</strong> (if it's a custom attribute) or <strong>sets it to null/default value</strong> (if the attribute is Synerise-native).The body contains an array of objects to update. The objects are the same as in the *Create a Profile* and *Update a Profile* endpoints.<span style='color:red'><strong>IMPORTANT:</strong></span> The request body cannot contain more than 1000 items or exceed 1 MB in size.
     * @param array<Batch> $body The request body
     * @param BatchRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<void|null>
     * @throws Exception
    */
    public function post(array $body, ?BatchRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '401' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '403' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '415' => [HTTP400::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendNoContentAsync($requestInfo, $errorMappings);
    }

    /**
     *  Enqueue a number of add/update operations in the Synerise application database. <br/><br/>If you don't have some information about a profile, don't insert a null-value parameter - omit the parameter entirely. Sending a null value <strong>deletes an attribute</strong> (if it's a custom attribute) or <strong>sets it to null/default value</strong> (if the attribute is Synerise-native).The body contains an array of objects to update. The objects are the same as in the *Create a Profile* and *Update a Profile* endpoints.<span style='color:red'><strong>IMPORTANT:</strong></span> The request body cannot contain more than 1000 items or exceed 1 MB in size.
     * @param array<Batch> $body The request body
     * @param BatchRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(array $body, ?BatchRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
        $requestInfo = new RequestInformation();
        $requestInfo->urlTemplate = $this->urlTemplate;
        $requestInfo->pathParameters = $this->pathParameters;
        $requestInfo->httpMethod = HttpMethod::POST;
        if ($requestConfiguration !== null) {
            $requestInfo->addHeaders($requestConfiguration->headers);
            $requestInfo->addRequestOptions(...$requestConfiguration->options);
        }
        $requestInfo->tryAddHeader('Accept', "application/json");
        $requestInfo->setContentFromParsableCollection($this->requestAdapter, "application/json", $body);
        return $requestInfo;
    }

    /**
     * Returns a request builder with the provided arbitrary URL. Using this method means any other path or query parameters are ignored.
     * @param string $rawUrl The raw URL to use for the request builder.
     * @return BatchRequestBuilder
    */
    public function withUrl(string $rawUrl): BatchRequestBuilder {
        return new BatchRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
