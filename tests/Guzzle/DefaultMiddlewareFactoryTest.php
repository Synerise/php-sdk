<?php

declare(strict_types=1);

namespace Synerise\Tests\Guzzle;

use Microsoft\Kiota\Abstractions\Authentication\AuthenticationProvider;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Synerise\Sdk\Api\Authentication\AuthenticationProviderFactoryInterface;
use Synerise\Sdk\Api\Config;
use Synerise\Sdk\Guzzle\DefaultMiddlewareFactory;
use Synerise\Sdk\Guzzle\Middleware\LogMiddlewareFactory;
use Synerise\Sdk\Guzzle\Middleware\RetryMiddlewareFactory;

class DefaultMiddlewareFactoryTest extends TestCase
{
    public function testCreateWithNoFactoriesShouldReturnEmptyArray(): void
    {
        $factory = new DefaultMiddlewareFactory();
        $config = $this->createMock(Config::class);

        $result = $factory->create($config);

        $this->assertEmpty($result);
    }

    public function testCreateWithRetryFactoryShouldIncludeRetryMiddleware(): void
    {
        $authProvider = $this->createMock(AuthenticationProvider::class);
        $authFactory = $this->createMock(AuthenticationProviderFactoryInterface::class);
        $authFactory->method('create')->willReturn($authProvider);

        $logger = $this->createMock(LoggerInterface::class);
        $retryFactory = new RetryMiddlewareFactory($authFactory, $logger);

        $factory = new DefaultMiddlewareFactory($retryFactory);
        $config = $this->createMock(Config::class);

        $result = $factory->create($config);

        $this->assertArrayHasKey('retryMiddleware', $result);
    }

    public function testCreateWithLogFactoryAndLoggingEnabledShouldIncludeLogMiddleware(): void
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logFactory = new LogMiddlewareFactory($logger);

        $config = $this->createMock(Config::class);
        $config->method('isRequestLoggingEnabled')->willReturn(true);

        $factory = new DefaultMiddlewareFactory(null, $logFactory);

        $result = $factory->create($config);

        $this->assertArrayHasKey('logMiddleware', $result);
    }

    public function testCreateWithLogFactoryAndLoggingDisabledShouldNotIncludeLogMiddleware(): void
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logFactory = new LogMiddlewareFactory($logger);

        $config = $this->createMock(Config::class);
        $config->method('isRequestLoggingEnabled')->willReturn(false);

        $factory = new DefaultMiddlewareFactory(null, $logFactory);

        $result = $factory->create($config);

        $this->assertArrayNotHasKey('logMiddleware', $result);
    }
}
