<?php

namespace Synerise\Api\V4\Events\LoggedIn;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\V4\Models\HTTP400;

/**
 * Builds and executes requests for operations under /events/logged-in
*/
class LoggedInRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Instantiates a new LoggedInRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/events/logged-in');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Send a 'profile logged in' event. <br/><br/>If you don't have a value for a field, omit that field. Do not send null values.When you send an event to this endpoint, the `action` field is set to `client.login` by the backend.
     * @param LoggedInPostRequestBody $body The request body
     * @param LoggedInRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<void|null>
     * @throws Exception
    */
    public function post(LoggedInPostRequestBody $body, ?LoggedInRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
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
     * Send a 'profile logged in' event. <br/><br/>If you don't have a value for a field, omit that field. Do not send null values.When you send an event to this endpoint, the `action` field is set to `client.login` by the backend.
     * @param LoggedInPostRequestBody $body The request body
     * @param LoggedInRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(LoggedInPostRequestBody $body, ?LoggedInRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * @return LoggedInRequestBuilder
    */
    public function withUrl(string $rawUrl): LoggedInRequestBuilder {
        return new LoggedInRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
