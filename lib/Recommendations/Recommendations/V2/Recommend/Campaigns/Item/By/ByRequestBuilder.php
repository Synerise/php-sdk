<?php

namespace Synerise\Api\Recommendations\Recommendations\V2\Recommend\Campaigns\Item\By;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\Recommendations\Recommendations\V2\Recommend\Campaigns\Item\By\Item\WithIdentifierNameItemRequestBuilder;

/**
 * Builds and executes requests for operations under /recommendations/v2/recommend/campaigns/{campaignIdentifier}/by
*/
class ByRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Gets an item from the Synerise/Api/Recommendations.recommendations.v2.recommend.campaigns.item.by.item collection
     * @param string $identifierName The name of the profile identifier to use for the request. By default, the allowed identifier types are `id`, `uuid`, `email`, and `custom_identify`. This may be changed in the workspace configuration.
     * @return WithIdentifierNameItemRequestBuilder
    */
    public function byIdentifierName(string $identifierName): WithIdentifierNameItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['identifierName'] = $identifierName;
        return new WithIdentifierNameItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new ByRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/recommendations/v2/recommend/campaigns/{campaignIdentifier}/by');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
