<?php

namespace Synerise\Sdk\Guzzle\Middleware;

use Microsoft\Kiota\Abstractions\Authentication\AuthenticationProvider;
use Psr\Log\LoggerInterface;

class RetryMiddlewareFactory
{
    private LoggerInterface $logger;

    private int $maxRetries;

    public function __construct(LoggerInterface $logger, $maxRetries = 1){
        $this->logger = $logger;
        $this->maxRetries = $maxRetries;
    }

    public function create(AuthenticationProvider $authenticationProvider): RetryMiddleware
    {
        return new RetryMiddleware($authenticationProvider, $this->logger, $this->maxRetries);
    }
}