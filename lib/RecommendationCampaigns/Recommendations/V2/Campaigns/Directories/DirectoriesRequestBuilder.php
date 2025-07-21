<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Directories;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\HttpMethod;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Api\RecommendationCampaigns\Models\DirectoryId;
use Synerise\Api\RecommendationCampaigns\Models\DirectoryName;
use Synerise\Api\RecommendationCampaigns\Models\Error;
use Synerise\Api\RecommendationCampaigns\Models\RecommendationDirectory;
use Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Directories\Item\WithDirectoryItemRequestBuilder;

/**
 * Builds and executes requests for operations under /recommendations/v2/campaigns/directories
*/
class DirectoriesRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Gets an item from the Synerise/Api/RecommendationCampaigns.recommendations.v2.campaigns.directories.item collection
     * @param string $directoryId ID of the directory
     * @return WithDirectoryItemRequestBuilder
    */
    public function byDirectoryId(string $directoryId): WithDirectoryItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['directoryId'] = $directoryId;
        return new WithDirectoryItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new DirectoriesRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/recommendations/v2/campaigns/directories');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

    /**
     * Fetch recommendation directory data.
     * @param DirectoriesRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<array<RecommendationDirectory>|null>
     * @throws Exception
    */
    public function get(?DirectoriesRequestBuilderGetRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toGetRequestInformation($requestConfiguration);
        $errorMappings = [
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendCollectionAsync($requestInfo, [RecommendationDirectory::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Create recommendation directory.
     * @param DirectoryName $body The request body
     * @param DirectoriesRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return Promise<DirectoryId|null>
     * @throws Exception
    */
    public function post(DirectoryName $body, ?DirectoriesRequestBuilderPostRequestConfiguration $requestConfiguration = null): Promise {
        $requestInfo = $this->toPostRequestInformation($body, $requestConfiguration);
        $errorMappings = [
                '500' => [Error::class, 'createFromDiscriminatorValue'],
        ];
        return $this->requestAdapter->sendAsync($requestInfo, [DirectoryId::class, 'createFromDiscriminatorValue'], $errorMappings);
    }

    /**
     * Fetch recommendation directory data.
     * @param DirectoriesRequestBuilderGetRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toGetRequestInformation(?DirectoriesRequestBuilderGetRequestConfiguration $requestConfiguration = null): RequestInformation {
        $requestInfo = new RequestInformation();
        $requestInfo->urlTemplate = $this->urlTemplate;
        $requestInfo->pathParameters = $this->pathParameters;
        $requestInfo->httpMethod = HttpMethod::GET;
        if ($requestConfiguration !== null) {
            $requestInfo->addHeaders($requestConfiguration->headers);
            $requestInfo->addRequestOptions(...$requestConfiguration->options);
        }
        $requestInfo->tryAddHeader('Accept', "application/json");
        return $requestInfo;
    }

    /**
     * Create recommendation directory.
     * @param DirectoryName $body The request body
     * @param DirectoriesRequestBuilderPostRequestConfiguration|null $requestConfiguration Configuration for the request such as headers, query parameters, and middleware options.
     * @return RequestInformation
    */
    public function toPostRequestInformation(DirectoryName $body, ?DirectoriesRequestBuilderPostRequestConfiguration $requestConfiguration = null): RequestInformation {
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
     * @return DirectoriesRequestBuilder
    */
    public function withUrl(string $rawUrl): DirectoriesRequestBuilder {
        return new DirectoriesRequestBuilder($rawUrl, $this->requestAdapter);
    }

}
