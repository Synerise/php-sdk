<?php

namespace Synerise\Api\Workspace\Tracker\GetOrCreateByDomain;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\Workspace\Models\TrackingCodeCreationByDomainRequest;
use Synerise\Api\Workspace\Models\TrackingCodeResponse;

/**
 * Builds and executes requests for operations under /tracker/get-or-create-by-domain
*/
class GetOrCreateByDomainRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Instantiates a new GetOrCreateByDomainRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/tracker/get-or-create-by-domain');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * @param TrackingCodeCreationByDomainRequest $body The request body
     * @param GetOrCreateByDomainRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<TrackingCodeResponse|null>
     * @throws Exception
    */
    public function post(TrackingCodeCreationByDomainRequest $body, ?GetOrCreateByDomainRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        return $this->requestAdapter->sendAsync($requestInfo, [TrackingCodeResponse::class, 'createFromDiscriminatorValue'], null);
    }

    /**
     * @param TrackingCodeCreationByDomainRequest $body The request body
     * @param GetOrCreateByDomainRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(TrackingCodeCreationByDomainRequest $body, ?GetOrCreateByDomainRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * @return GetOrCreateByDomainRequestBuilder
    */
    public function withUrl(string $rawUrl): GetOrCreateByDomainRequestBuilder {
        return new GetOrCreateByDomainRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
