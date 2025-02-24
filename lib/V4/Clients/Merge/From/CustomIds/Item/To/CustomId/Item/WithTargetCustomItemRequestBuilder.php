<?php

namespace Synerise\Api\V4\Clients\Merge\From\CustomIds\Item\To\CustomId\Item;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\V4\Models\HTTP400;
use Synerise\Api\V4\Models\InResponseClientDetails;

/**
 * Builds and executes requests for operations under /clients/merge/from/custom-ids/{sourceCustomIDs}/to/custom-id/{targetCustomID}
*/
class WithTargetCustomItemRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Instantiates a new WithTargetCustomItemRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/clients/merge/from/custom-ids/{sourceCustomIDs}/to/custom-id/{targetCustomID}');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Moves profile UUIDs to a single profile (which must already exist) and removes the profiles that were merged.  The event history of the source profiles is moved to the target profile.The attributes (data from the `attributes` object) that don't exist in the target profile are copied to the target profile. If an attribute already exists in the target profile, the value from the source profile is lost.The properties and tags of the source profiles are lost, even if they don't have a value in the target profile. <p style='color:red'><strong>WARNING:</strong> This operation is irreversible. Use it carefully.</p> <p style='color:red'><strong>WARNING:</strong> You should not try to merge more than 10-20 profiles at once.</p> For more details, see the [Developer Guide](https://hub.synerise.com/developers/api/clients/profiles/merging-profiles/).
     * @param WithTargetCustomItemRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<InResponseClientDetails|null>
     * @throws Exception
    */
    public function post(?WithTargetCustomItemRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($requestConfiguration);
        $errorMappings = [
                '401' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '403' => [HTTP400::class, 'createFromDiscriminatorValue'],
                '404' => [HTTP400::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [InResponseClientDetails::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Moves profile UUIDs to a single profile (which must already exist) and removes the profiles that were merged.  The event history of the source profiles is moved to the target profile.The attributes (data from the `attributes` object) that don't exist in the target profile are copied to the target profile. If an attribute already exists in the target profile, the value from the source profile is lost.The properties and tags of the source profiles are lost, even if they don't have a value in the target profile. <p style='color:red'><strong>WARNING:</strong> This operation is irreversible. Use it carefully.</p> <p style='color:red'><strong>WARNING:</strong> You should not try to merge more than 10-20 profiles at once.</p> For more details, see the [Developer Guide](https://hub.synerise.com/developers/api/clients/profiles/merging-profiles/).
     * @param WithTargetCustomItemRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(?WithTargetCustomItemRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
        $requestInfo = new RequestInformation();
        $requestInfo->urlTemplate = $this->urlTemplate;
        $requestInfo->pathParameters = $this->pathParameters;
        $requestInfo->httpMethod = HttpMethod::POST;
        if ($requestConfiguration !== null) {
            $requestInfo->addHeaders($requestConfiguration->headers);
            $requestInfo->addRequestOptions(...$requestConfiguration->options);
        }
        $requestInfo->tryAddHeader('Accept', "application/json");
        return $requestInfo;
    }

    /**
     * Returns a request builder with the provided arbitrary URL. Using this method means any other path or query parameters are ignored.
     * @param string $rawUrl The raw URL to use for the request builder.
     * @return WithTargetCustomItemRequestBuilder
    */
    public function withUrl(string $rawUrl): WithTargetCustomItemRequestBuilder {
        return new WithTargetCustomItemRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
