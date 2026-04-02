<?php

declare(strict_types=1);

namespace Synerise\Sdk\Guzzle\Middleware;

use Loguzz\Middleware\LogMiddleware;
use Psr\Log\LoggerInterface;
use Synerise\Sdk\Guzzle\RequestCurlSanitizedFormatter;

class LogMiddlewareFactory
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function create(): LogMiddleware
    {
        return new LogMiddleware(
            $this->logger,
            ['request_formatter' => new RequestCurlSanitizedFormatter()]
        );
    }
}
