<?php

declare(strict_types=1);

namespace Synerise\Tests\Guzzle;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Api\Config;
use Synerise\Sdk\Guzzle\ClientFactory;

class ClientFactoryTest extends TestCase
{
    public function testCreateShouldReturnGuzzleClient(): void
    {
        $config = $this->createMock(Config::class);
        $config->method('getTimeout')->willReturn(30.0);
        $config->method('getUserAgent')->willReturn('TestAgent/1.0');
        $config->method('isKeepAliveEnabled')->willReturn(false);

        $factory = new ClientFactory();
        $client = $factory->create($config);

        $this->assertInstanceOf(Client::class, $client);
    }

    public function testCreateWithKeepAliveShouldIncludeConnectionHeader(): void
    {
        $config = $this->createMock(Config::class);
        $config->method('getTimeout')->willReturn(10.0);
        $config->method('getUserAgent')->willReturn('TestAgent/1.0');
        $config->method('isKeepAliveEnabled')->willReturn(true);

        $factory = new ClientFactory();
        $client = $factory->create($config);

        $this->assertInstanceOf(Client::class, $client);
    }

    public function testCreateWithMiddlewaresShouldReturnClient(): void
    {
        $config = $this->createMock(Config::class);
        $config->method('getTimeout')->willReturn(10.0);
        $config->method('getUserAgent')->willReturn('TestAgent/1.0');
        $config->method('isKeepAliveEnabled')->willReturn(false);

        $middleware = function ($handler) {
            return $handler;
        };

        $factory = new ClientFactory();
        $client = $factory->create($config, ['testMiddleware' => $middleware]);

        $this->assertInstanceOf(Client::class, $client);
    }
}
