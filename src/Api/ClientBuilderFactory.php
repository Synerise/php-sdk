<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api;

use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Sdk\Api\Authentication\AuthenticationProviderFactory;
use Synerise\Sdk\Guzzle\RequestAdapterFactoryInterface;

class ClientBuilderFactory implements ClientBuilderFactoryInterface
{
    private AuthenticationProviderFactory $authenticationProviderFactory;

    private RequestAdapterFactoryInterface $requestAdapterFactory;

    public function __construct(
        AuthenticationProviderFactory $authenticationProviderFactory,
        RequestAdapterFactoryInterface $requestAdapterFactory
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
