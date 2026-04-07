<?php

declare(strict_types=1);

namespace Synerise\Tests\Guzzle\Middleware;

use Microsoft\Kiota\Abstractions\Authentication\AuthenticationProvider;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Synerise\Sdk\Api\Authentication\AuthenticationProviderFactoryInterface;
use Synerise\Sdk\Api\Config;
use Synerise\Sdk\Guzzle\Middleware\RetryMiddleware;
use Synerise\Sdk\Guzzle\Middleware\RetryMiddlewareFactory;

class RetryMiddlewareFactoryTest extends TestCase
{
    public function testCreateShouldReturnRetryMiddleware(): void
    {
        $authProvider = $this->createMock(AuthenticationProvider::class);
        $authFactory = $this->createMock(AuthenticationProviderFactoryInterface::class);
        $authFactory->method('create')->willReturn($authProvider);

        $logger = $this->createMock(LoggerInterface::class);
        $config = $this->createMock(Config::class);

        $factory = new RetryMiddlewareFactory($authFactory, $logger, 3);

        $result = $factory->create($config);

        $this->assertInstanceOf(RetryMiddleware::class, $result);
    }
}
