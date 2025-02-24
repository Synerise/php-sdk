<?php

namespace Synerise\Api\V4\Transactions;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\V4\Models\CreateatransactionRequest;
use Synerise\Api\V4\Models\HTTP400;
use Synerise\Api\V4\Transactions\Batch\BatchRequestBuilder;

/**
 * Builds and executes requests for operations under /transactions
*/
class TransactionsRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The batch property
    */
    public function batch(): BatchRequestBuilder {
        return new BatchRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new TransactionsRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/transactions');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Create a transaction record in the database.For each transaction, a `transaction.charge` event is generated automatically. In addition, each item in the `products` array produces a `product.buy` event.All monetary values must use the same currency and be greaterthan or equal to zero. `discountAmount` must be greater than zeroor omitted.
     * @param CreateatransactionRequest $body The request body
     * @param TransactionsRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<void|null>
     * @throws Exception
    */
    public function post(CreateatransactionRequest $body, ?TransactionsRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
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
     * Create a transaction record in the database.For each transaction, a `transaction.charge` event is generated automatically. In addition, each item in the `products` array produces a `product.buy` event.All monetary values must use the same currency and be greaterthan or equal to zero. `discountAmount` must be greater than zeroor omitted.
     * @param CreateatransactionRequest $body The request body
     * @param TransactionsRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(CreateatransactionRequest $body, ?TransactionsRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * @return TransactionsRequestBuilder
    */
    public function withUrl(string $rawUrl): TransactionsRequestBuilder {
        return new TransactionsRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
