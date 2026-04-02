<?php

declare(strict_types=1);

namespace Synerise\Tests\Guzzle;

use Microsoft\Kiota\Abstractions\Authentication\AnonymousAuthenticationProvider;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Api\Config;
use Synerise\Sdk\Guzzle\ClientFactory;
use Synerise\Sdk\Guzzle\RequestAdapterFactory;

class RequestAdapterFactoryTest extends TestCase
{
    public function testCreateShouldReturnRequestAdapter(): void
    {
        $config = $this->createMock(Config::class);
        $config->method('getTimeout')->willReturn(30.0);
        $config->method('getUserAgent')->willReturn('TestAgent/1.0');
        $config->method('isKeepAliveEnabled')->willReturn(false);

        $factory = new RequestAdapterFactory(new ClientFactory());
        $adapter = $factory->create($config, new AnonymousAuthenticationProvider());

        $this->assertInstanceOf(RequestAdapter::class, $adapter);
    }

    public function testCreateWithMiddlewaresShouldReturnRequestAdapter(): void
    {
        $config = $this->createMock(Config::class);
        $config->method('getTimeout')->willReturn(10.0);
        $config->method('getUserAgent')->willReturn('TestAgent/1.0');
        $config->method('isKeepAliveEnabled')->willReturn(false);

        $middleware = function ($handler) {
            return $handler;
        };

        $factory = new RequestAdapterFactory(new ClientFactory());
        $adapter = $factory->create(
            $config,
            new AnonymousAuthenticationProvider(),
            ['test' => $middleware]
        );

        $this->assertInstanceOf(RequestAdapter::class, $adapter);
    }
}
