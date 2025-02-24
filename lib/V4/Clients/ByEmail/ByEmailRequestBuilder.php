<?php

namespace Synerise\Api\V4\Clients\ByEmail;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\V4\Clients\ByEmail\Item\WithClientEmailItemRequestBuilder;

/**
 * Builds and executes requests for operations under /clients/by-email
*/
class ByEmailRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Gets an item from the Synerise/Api/V4.clients.byEmail.item collection
     * @param string $clientEmail The profile's email address- Must match the pattern (ECMA flavor): `/^(([^<>()[/]//.,;:/s@//"]+(/.[^<>()[/]//.,;:/s@//"]+)*)|(//".+//"))@((/[[0-9]{1,3}/.[0-9]{1,3}/.[0-9]{1,3}/.[0-9]{1,3}/])|(([a-zA-Z/-0-9]+/.)+[a-zA-Z]{2,}))$/`- The value can't include any characters that match the patternn (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`
     * @return WithClientEmailItemRequestBuilder
    */
    public function byClientEmail(string $clientEmail): WithClientEmailItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['clientEmail'] = $clientEmail;
        return new WithClientEmailItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new ByEmailRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/clients/by-email');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
