<?php

namespace Synerise\Api\Catalogs;

use Microsoft\Kiota\Abstractions\ApiClientBuilder;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\Catalogs\Bags\BagsRequestBuilder;
use Synerise\Api\Catalogs\Items\ItemsRequestBuilder;

/**
 * The main entry point of the SDK, exposes the configuration and the fluent API.
*/
class Catalogs extends BaseRequestBuilder 
{
    /**
     * The bags property
    */
    public function bags(): BagsRequestBuilder {
        return new BagsRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * The items property
    */
    public function items(): ItemsRequestBuilder {
        return new ItemsRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new Catalogs and sets the default values.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct(RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}');
        if (empty($this->requestAdapter->getBaseUrl())) {
            $this->requestAdapter->setBaseUrl('https://api.synerise.com/catalogs');
        }
        $this->pathParameters['baseurl'] = $this->requestAdapter->getBaseUrl();
    }

}
