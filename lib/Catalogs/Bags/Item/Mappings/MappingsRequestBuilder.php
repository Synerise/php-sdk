<?php

namespace Synerise\Api\Catalogs\Bags\Item\Mappings;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\Catalogs\Models\EventData;

/**
 * Builds and executes requests for operations under /bags/{catalogId}/mappings
*/
class MappingsRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Instantiates a new MappingsRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/bags/{catalogId}/mappings');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Add a new mapping. Mappings can be used to enrich events with data from catalogs.For example, you can map the product's SKU from the "client purchased" event to the column in the catalog that includes the SKU. Whenever a customer purchases an item with that SKU, you can extract data from the catalog (for example, the product's brand and category) and show that additional in the event log in the Synerise GUI.
     * @param EventData $body The request body
     * @param MappingsRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<MappingsPostResponse|null>
     * @throws Exception
    */
    public function post(EventData $body, ?MappingsRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        return $this->requestAdapter->sendAsync($requestInfo, [MappingsPostResponse::class, 'createFromDiscriminatorValue'], null);
    }

    /**
     * Add a new mapping. Mappings can be used to enrich events with data from catalogs.For example, you can map the product's SKU from the "client purchased" event to the column in the catalog that includes the SKU. Whenever a customer purchases an item with that SKU, you can extract data from the catalog (for example, the product's brand and category) and show that additional in the event log in the Synerise GUI.
     * @param EventData $body The request body
     * @param MappingsRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(EventData $body, ?MappingsRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * @return MappingsRequestBuilder
    */
    public function withUrl(string $rawUrl): MappingsRequestBuilder {
        return new MappingsRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
