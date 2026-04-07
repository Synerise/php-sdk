<?php

declare(strict_types=1);

namespace Synerise\Tests\Guzzle;

use Microsoft\Kiota\Abstractions\Authentication\AuthenticationProvider;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Synerise\Sdk\Api\Authentication\AuthenticationProviderFactoryInterface;
use Synerise\Sdk\Api\Config;
use Synerise\Sdk\Guzzle\AuthenticationMiddlewareFactory;
use Synerise\Sdk\Guzzle\Middleware\RetryMiddlewareFactory;

class AuthenticationMiddlewareFactoryTest extends TestCase
{
    public function testCreateWithoutRetryFactoryShouldReturnEmptyArray(): void
    {
        $factory = new AuthenticationMiddlewareFactory();
        $config = $this->createMock(Config::class);

        $result = $factory->create($config);

        $this->assertEmpty($result);
    }

    public function testCreateWithRetryFactoryShouldReturnRetryMiddleware(): void
    {
        $authProvider = $this->createMock(AuthenticationProvider::class);
        $authFactory = $this->createMock(AuthenticationProviderFactoryInterface::class);
        $authFactory->method('create')->willReturn($authProvider);

        $logger = $this->createMock(LoggerInterface::class);
        $retryFactory = new RetryMiddlewareFactory($authFactory, $logger);

        $factory = new AuthenticationMiddlewareFactory($retryFactory);
        $config = $this->createMock(Config::class);

        $result = $factory->create($config);

        $this->assertArrayHasKey('retryMiddleware', $result);
    }
}
