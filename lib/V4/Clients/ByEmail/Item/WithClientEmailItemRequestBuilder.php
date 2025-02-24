<?php

namespace Synerise\Api\V4\Clients\ByEmail\Item;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\V4\Models\CreateClientRequestBody;
use Synerise\Api\V4\Models\HTTP400;

/**
 * Builds and executes requests for operations under /clients/by-email/{clientEmail}
*/
class WithClientEmailItemRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Instantiates a new WithClientEmailItemRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/clients/by-email/{clientEmail}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Change the details of a profile in the Synerise application database. <br/><br/>Sending a null value <strong>deletes an attribute</strong> (if it's a custom attribute) or <strong>sets it to null/default value</strong> (if the attribute is Synerise-native).The `attributes` object can be used to add custom attributes of your choice. For example, `"hasDog":true`.The `tags` array contains custom tags of your choice.
     * @param CreateClientRequestBody $body The request body
     * @param WithClientEmailItemRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<void|null>
     * @throws Exception
    */
    public function post(CreateClientRequestBody $body, ?WithClientEmailItemRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '400' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '401' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '403' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '404' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '415' => [HTTP400::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendNoContentAsync($requestInfo, $errorMappings);
    }

    /**
     * Change the details of a profile in the Synerise application database. <br/><br/>Sending a null value <strong>deletes an attribute</strong> (if it's a custom attribute) or <strong>sets it to null/default value</strong> (if the attribute is Synerise-native).The `attributes` object can be used to add custom attributes of your choice. For example, `"hasDog":true`.The `tags` array contains custom tags of your choice.
     * @param CreateClientRequestBody $body The request body
     * @param WithClientEmailItemRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(CreateClientRequestBody $body, ?WithClientEmailItemRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * @return WithClientEmailItemRequestBuilder
    */
    public function withUrl(string $rawUrl): WithClientEmailItemRequestBuilder {
        return new WithClientEmailItemRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
