<?php

namespace Synerise\Sdk\Api;

use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\Catalogs\Catalogs;
use Synerise\Api\Search\Search;
use Synerise\Api\SearchConfig\SearchConfig;
use Synerise\Api\Uauth\Uauth;
use Synerise\Api\V4\V4;
use Synerise\Api\Workspace\Workspace;
use Synerise\Sdk\Api\Authentication\AuthenticationProviderFactory;
use Synerise\Sdk\Guzzle\RequestAdapterFactory;

class ClientBuilder
{
    /**
     * @var Config
     */
    private Config $config;

    /**
     * @var RequestAdapter
     */
    private RequestAdapter $requestAdapter;

    /**
     * Client builder. Fixes paths. If no request adapter provided, then it will be created by config.
     * @param Config $config
     * @param RequestAdapter|null $requestAdapter Request adapter with authentication
     */
    public function __construct(
        Config $config,
        ?RequestAdapter $requestAdapter = null
    ) {
        if (!$requestAdapter) {
            $authenticationProviderFactory = new AuthenticationProviderFactory($config);
            $requestAdapterFactory = new RequestAdapterFactory($config);
            $requestAdapter = $requestAdapterFactory->create($authenticationProviderFactory->create());
        }

        $this->config = $config;
        $this->requestAdapter = $requestAdapter;
    }

    /**
     * Returns v4 api client with fixed path.
     * @return V4
     */
    public function v4(): V4
    {
        $this->requestAdapter->setBaseUrl($this->config->getApiHost() . '/v4');
        return new V4($this->requestAdapter);
    }

    /**
     * Returns catalogs api client with fixed path.
     * @return Catalogs
     */
    public function catalogs(): Catalogs
    {
        $this->requestAdapter->setBaseUrl($this->config->getApiHost() . '/catalogs');
        return new Catalogs($this->requestAdapter);
    }

    /**
     * Returns search api client with fixed path.
     * @return Search
     */
    public function search(): Search
    {
        return new Search($this->requestAdapter);
    }

    /**
     * Returns search config api client with fixed path.
     * @return SearchConfig
     */
    public function searchConfig(): SearchConfig
    {
        return new SearchConfig($this->requestAdapter);
    }

    /**
     * Returns uauth api client with fixed path.
     * @return Uauth
     */
    public function uauth(): Uauth
    {
        $this->requestAdapter->setBaseUrl($this->config->getApiHost() . '/uauth');
        return new Uauth($this->requestAdapter);
    }

    /**
     * Returns workspace api client with fixed path.
     * @return Workspace
     */
    public function workspace(): Workspace
    {
        $this->requestAdapter->setBaseUrl($this->config->getApiHost() . '/business-profile-service');
        return new Workspace($this->requestAdapter);
    }
}
