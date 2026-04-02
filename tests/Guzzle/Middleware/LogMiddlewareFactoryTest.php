<?php

declare(strict_types=1);

namespace Synerise\Tests\Guzzle\Middleware;

use Loguzz\Middleware\LogMiddleware;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Synerise\Sdk\Guzzle\Middleware\LogMiddlewareFactory;

class LogMiddlewareFactoryTest extends TestCase
{
    public function testCreateShouldReturnLogMiddleware(): void
    {
        $logger = $this->createMock(LoggerInterface::class);
        $factory = new LogMiddlewareFactory($logger);

        $result = $factory->create();

        $this->assertInstanceOf(LogMiddleware::class, $result);
    }
}
