<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api;

use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Sdk\Api\Authentication\AuthenticationProviderFactory;
use Synerise\Sdk\Guzzle\RequestAdapterFactory;

class ClientBuilderFactory
{
    private AuthenticationProviderFactory $authenticationProviderFactory;

    private RequestAdapterFactory $requestAdapterFactory;

    public function __construct(
        AuthenticationProviderFactory $authenticationProviderFactory,
        RequestAdapterFactory $requestAdapterFactory
    ) {
        $this->authenticationProviderFactory = $authenticationProviderFactory;
        $this->requestAdapterFactory = $requestAdapterFactory;
    }

    public function create(?Config $config, ?RequestAdapter $requestAdapter = null): ?ClientBuilder
    {
        if (!$config) {
            return null;
        }

        $authenticationProvider = $this->authenticationProviderFactory->get($config);

        if (!$requestAdapter) {
            $requestAdapter = $this->requestAdapterFactory->create(
                $config,
                $authenticationProvider
            );
        }

        return new ClientBuilder($config, $requestAdapter);
    }
}
