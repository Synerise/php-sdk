<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api;

use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Sdk\Api\Authentication\AuthenticationProviderFactoryInterface;
use Synerise\Sdk\Guzzle\MiddlewareFactoryInterface;
use Synerise\Sdk\Guzzle\RequestAdapterFactoryInterface;

class ClientBuilderFactory implements ClientBuilderFactoryInterface
{
    private AuthenticationProviderFactoryInterface $authenticationProviderFactory;

    private RequestAdapterFactoryInterface $requestAdapterFactory;

    /**
     * @var MiddlewareFactoryInterface|null
     */
    private ?MiddlewareFactoryInterface $middlewareFactory;

    public function __construct(
        AuthenticationProviderFactoryInterface $authenticationProviderFactory,
        RequestAdapterFactoryInterface $requestAdapterFactory,
        ?MiddlewareFactoryInterface $middlewareFactory = null
    ) {
        $this->authenticationProviderFactory = $authenticationProviderFactory;
        $this->requestAdapterFactory = $requestAdapterFactory;
        $this->middlewareFactory = $middlewareFactory;

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
                $authenticationProvider,
                $this->middlewareFactory ? $this->middlewareFactory->create($config) : []
            );
        }

        return new ClientBuilder($config, $requestAdapter);
    }
}
