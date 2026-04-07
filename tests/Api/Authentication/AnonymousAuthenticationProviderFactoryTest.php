<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\Authentication;

use Microsoft\Kiota\Abstractions\Authentication\AnonymousAuthenticationProvider;
use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Api\Authentication\AnonymousAuthenticationProviderFactory;
use Synerise\Sdk\Api\Config;

class AnonymousAuthenticationProviderFactoryTest extends TestCase
{
    public function testCreateShouldReturnAnonymousProvider(): void
    {
        $factory = new AnonymousAuthenticationProviderFactory();
        $config = $this->createMock(Config::class);

        $result = $factory->create($config);

        $this->assertInstanceOf(AnonymousAuthenticationProvider::class, $result);
    }

    public function testGetShouldReturnAnonymousProvider(): void
    {
        $factory = new AnonymousAuthenticationProviderFactory();
        $config = $this->createMock(Config::class);

        $result = $factory->get($config);

        $this->assertInstanceOf(AnonymousAuthenticationProvider::class, $result);
    }
}
