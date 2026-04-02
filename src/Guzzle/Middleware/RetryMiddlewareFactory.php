<?php

declare(strict_types=1);

namespace Synerise\Sdk\Guzzle\Middleware;

use Psr\Log\LoggerInterface;
use Synerise\Sdk\Api\Authentication\AuthenticationProviderFactoryInterface;
use Synerise\Sdk\Api\Config;

class RetryMiddlewareFactory
{
    private AuthenticationProviderFactoryInterface $authenticationProviderFactory;

    private LoggerInterface $logger;

    private int $maxRetries;

    public function __construct(
        AuthenticationProviderFactoryInterface $authenticationProviderFactory,
        LoggerInterface $logger,
        int $maxRetries = 1
    ) {
        $this->authenticationProviderFactory = $authenticationProviderFactory;
        $this->logger = $logger;
        $this->maxRetries = $maxRetries;
    }

    public function create(Config $config): RetryMiddleware
    {
        $authenticationProvider = $this->authenticationProviderFactory->create($config);
        return new RetryMiddleware($authenticationProvider, $this->logger, $this->maxRetries);
    }
}
