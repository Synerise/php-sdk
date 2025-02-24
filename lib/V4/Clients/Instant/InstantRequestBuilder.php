<?php

namespace Synerise\Api\V4\Clients\Instant;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\V4\Models\HTTP400;

/**
 * Builds and executes requests for operations under /clients/instant
*/
class InstantRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Instantiates a new InstantRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/clients/instant');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Create a new profile in the Synerise application database.<br><br>You must provide at least one of those identifiers: `email`, `phone`, `customId`, `uuid`.<br/><br/>Sending a null value <strong>deletes an attribute</strong> (if it's a custom attribute) or <strong>sets it to null/default value</strong> (if the attribute is Synerise-native).
     * @param InstantPostRequestBody $body The request body
     * @param InstantRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<string|null>
     * @throws Exception
    */
    public function post(InstantPostRequestBody $body, ?InstantRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '400' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '401' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '403' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '415' => [HTTP400::class, 'createFromDiscriminatorValue'],
        ];
        /** @var Promise<string|null> $result */
        $result = $this->requestAdapter->sendPrimitiveAsync($requestInfo, 'string', $errorMappings);
        return $result;
    }

    /**
     * Create a new profile in the Synerise application database.<br><br>You must provide at least one of those identifiers: `email`, `phone`, `customId`, `uuid`.<br/><br/>Sending a null value <strong>deletes an attribute</strong> (if it's a custom attribute) or <strong>sets it to null/default value</strong> (if the attribute is Synerise-native).
     * @param InstantPostRequestBody $body The request body
     * @param InstantRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(InstantPostRequestBody $body, ?InstantRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * @return InstantRequestBuilder
    */
    public function withUrl(string $rawUrl): InstantRequestBuilder {
        return new InstantRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
