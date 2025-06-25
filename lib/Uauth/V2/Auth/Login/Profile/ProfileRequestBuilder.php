<?php

namespace Synerise\Api\Uauth\V2\Auth\Login\Profile;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\Uauth\Models\BusinessProfileAuthenticationRequest;
use Synerise\Api\Uauth\Models\Error;
use Synerise\Api\Uauth\Models\TokenResponse;

/**
 * Builds and executes requests for operations under /v2/auth/login/profile
*/
class ProfileRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Instantiates a new ProfileRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/v2/auth/login/profile');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Obtain a new Workspace JWT Token.
     * @param BusinessProfileAuthenticationRequest $body The request body
     * @param ProfileRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<TokenResponse|null>
     * @throws Exception
    */
    public function post(BusinessProfileAuthenticationRequest $body, ?ProfileRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '400' => [Error::class, 'createFromDiscriminatorValue'],
                '401' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [TokenResponse::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Obtain a new Workspace JWT Token.
     * @param BusinessProfileAuthenticationRequest $body The request body
     * @param ProfileRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(BusinessProfileAuthenticationRequest $body, ?ProfileRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * @return ProfileRequestBuilder
    */
    public function withUrl(string $rawUrl): ProfileRequestBuilder {
        return new ProfileRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
