<?php

namespace Synerise\Api\Catalogs\Bags\Item\Items\ItemKey;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\Catalogs\Bags\Item\Items\ItemKey\Item\WithItemKeyItemRequestBuilder;

/**
 * Builds and executes requests for operations under /bags/{catalogId}/items/itemKey
*/
class ItemKeyRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Gets an item from the Synerise/Api/Catalogs.bags.item.items.itemKey.item collection
     * @param string $itemKey Unique identifier of the item
     * @return WithItemKeyItemRequestBuilder
    */
    public function byItemKey(string $itemKey): WithItemKeyItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['itemKey'] = $itemKey;
        return new WithItemKeyItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new ItemKeyRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/bags/{catalogId}/items/itemKey');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
