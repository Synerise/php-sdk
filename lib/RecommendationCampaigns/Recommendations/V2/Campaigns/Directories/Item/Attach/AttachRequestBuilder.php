<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Directories\Item\Attach;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\RecommendationCampaigns\Models\AttachDirectoryBody;
use Synerise\Api\RecommendationCampaigns\Models\AttachDirectoryResponse;
use Synerise\Api\RecommendationCampaigns\Models\Error;

/**
 * Builds and executes requests for operations under /recommendations/v2/campaigns/directories/{directoryId}/attach
*/
class AttachRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Instantiates a new AttachRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/recommendations/v2/campaigns/directories/{directoryId}/attach');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Attach recommendation campaigns to specified directory.
     * @param AttachDirectoryBody $body The request body
     * @param AttachRequestBuilderPatchRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<AttachDirectoryResponse|null>
     * @throws Exception
    */
    public function patch(AttachDirectoryBody $body, ?AttachRequestBuilderPatchRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPatchRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [AttachDirectoryResponse::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Attach recommendation campaigns to specified directory.
     * @param AttachDirectoryBody $body The request body
     * @param AttachRequestBuilderPatchRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPatchRequestInformation(AttachDirectoryBody $body, ?AttachRequestBuilderPatchRequestConfiguration $requestConfiguration = null): RequestInformation {
        $requestInfo = new RequestInformation();
        $requestInfo->urlTemplate = $this->urlTemplate;
        $requestInfo->pathParameters = $this->pathParameters;
        $requestInfo->httpMethod = HttpMethod::PATCH;
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
     * @return AttachRequestBuilder
    */
    public function withUrl(string $rawUrl): AttachRequestBuilder {
        return new AttachRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
