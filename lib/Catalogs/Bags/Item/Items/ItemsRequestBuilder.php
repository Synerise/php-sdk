<?php

namespace Synerise\Api\Catalogs\Bags\Item\Items;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\Catalogs\Bags\Item\Items\Batch\BatchRequestBuilder;
use Synerise\Api\Catalogs\Bags\Item\Items\ByIds\ByIdsRequestBuilder;
use Synerise\Api\Catalogs\Bags\Item\Items\Download\DownloadRequestBuilder;
use Synerise\Api\Catalogs\Bags\Item\Items\EscapedList\ListRequestBuilder;
use Synerise\Api\Catalogs\Bags\Item\Items\Item\WithItemItemRequestBuilder;
use Synerise\Api\Catalogs\Bags\Item\Items\ItemKey\ItemKeyRequestBuilder;
use Synerise\Api\Catalogs\Bags\Item\Items\Upload\UploadRequestBuilder;
use Synerise\Api\Catalogs\Models\AddItem;

/**
 * Builds and executes requests for operations under /bags/{catalogId}/items
*/
class ItemsRequestBuilder extends BaseRequestBuilder 
{
    /**
     * The batch property
    */
    public function batch(): BatchRequestBuilder {
        return new BatchRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The byIds property
    */
    public function byIds(): ByIdsRequestBuilder {
        return new ByIdsRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The download property
    */
    public function download(): DownloadRequestBuilder {
        return new DownloadRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The list property
    */
    public function escapedList(): ListRequestBuilder {
        return new ListRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The itemKey property
    */
    public function itemKey(): ItemKeyRequestBuilder {
        return new ItemKeyRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The upload property
    */
    public function upload(): UploadRequestBuilder {
        return new UploadRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Gets an item from the Synerise/Api/Catalogs.bags.item.items.item collection
     * @param int $itemId ID of the item. This is the ID of the entry in the Synerisedatabase, not the unique identifier that you're using in yourcatalog. The itemId is available in the `id` field of the catalog item when you [retrieve items from a catalog](#operation/getItemsByBag):```{    "creationDate": "2020-09-30T11:31:16.314Z",    "id": 73753, // this is the itemId    "itemKey": "uniqueValue",    "lastModified": null,    "value": "{/"exampleKey/":/"uniqueValue/",/"exampleKey2/":/"exampleValue/"}",    "bag": {        "author": "authorName",        "creationDate": "2020-09-30T10:52:31.264Z",        "id": 1053, // this is the ID of the catalog        "lastModified": "2020-09-30T11:41:11.808Z",        "name": "sampleCatalog"    }},```
     * @return WithItemItemRequestBuilder
    */
    public function byItemId(int $itemId): WithItemItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['itemId'] = $itemId;
        return new WithItemItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new ItemsRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/bags/{catalogId}/items{?itemKey*,limit*,offset*,searchBy*}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Retrieve the entries from a single catalog.
     * @param ItemsRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<ItemsGetResponse|null>
     * @throws Exception
    */
    public function get(?ItemsRequestBuilderGetRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toGetRequestInformation($requestConfiguration);
        return $this->requestAdapter->sendAsync($requestInfo, [ItemsGetResponse::class, 'createFromDiscriminatorValue'], null);
    }

    /**
     * Add a single item to the catalog.
     * @param AddItem $body The request body
     * @param ItemsRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<bool|null>
     * @throws Exception
    */
    public function post(AddItem $body, ?ItemsRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        /** @var Promise<bool|null> $result */
        $result = $this->requestAdapter->sendPrimitiveAsync($requestInfo, 'bool', null);
        return $result;
    }

    /**
     * Retrieve the entries from a single catalog.
     * @param ItemsRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toGetRequestInformation(?ItemsRequestBuilderGetRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * Add a single item to the catalog.
     * @param AddItem $body The request body
     * @param ItemsRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(AddItem $body, ?ItemsRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * @return ItemsRequestBuilder
    */
    public function withUrl(string $rawUrl): ItemsRequestBuilder {
        return new ItemsRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
