<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\Authentication;

use InvalidArgumentException;
use Microsoft\Kiota\Abstractions\Authentication\AnonymousAuthenticationProvider;
use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Api\Authentication\BasicAuthenticationProvider;
use Synerise\Sdk\Api\Authentication\DefaultAuthenticationProviderFactory;
use Synerise\Sdk\Api\Authentication\WorkspaceBearerTokenAuthenticationProvider;
use Synerise\Sdk\Api\Config;
use Synerise\Sdk\Guzzle\ClientFactory;
use Synerise\Sdk\Guzzle\RequestAdapterFactory;
use Synerise\Sdk\Model\AuthenticationMethod;

class DefaultAuthenticationProviderFactoryTest extends TestCase
{
    public function testCreateWithBasicMethodShouldReturnBasicProvider(): void
    {
        $config = $this->createConfigMock('basic');

        $factory = $this->createFactory();
        $provider = $factory->create($config);

        $this->assertInstanceOf(BasicAuthenticationProvider::class, $provider);
    }

    public function testCreateWithBearerMethodShouldReturnBearerProvider(): void
    {
        $config = $this->createConfigMock('bearer');

        $factory = $this->createFactory();
        $provider = $factory->create($config);

        $this->assertInstanceOf(WorkspaceBearerTokenAuthenticationProvider::class, $provider);
    }

    public function testGetShouldCacheProviderByApiKey(): void
    {
        $config = $this->createConfigMock('basic');

        $factory = $this->createFactory();
        $provider1 = $factory->get($config);
        $provider2 = $factory->get($config);

        $this->assertSame($provider1, $provider2);
    }

    public function testCreateWithNullAuthMethodShouldReturnAnonymousProvider(): void
    {
        $config = $this->createMock(Config::class);
        $config->method('getAuthenticationMethod')->willReturn(null);

        $factory = $this->createFactory();
        $provider = $factory->create($config);

        $this->assertInstanceOf(AnonymousAuthenticationProvider::class, $provider);
    }

    public function testGetWithoutApiKeyShouldThrow(): void
    {
        $config = $this->createMock(Config::class);
        $config->method('getApiKey')->willReturn(null);

        $factory = $this->createFactory();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('API key is required');

        $factory->get($config);
    }

    private function createFactory(): DefaultAuthenticationProviderFactory
    {
        return new DefaultAuthenticationProviderFactory(
            new RequestAdapterFactory(new ClientFactory())
        );
    }

    private function createConfigMock(string $authMethod): Config
    {
        $config = $this->createMock(Config::class);
        $config->method('getAuthenticationMethod')->willReturn(new AuthenticationMethod($authMethod));
        $config->method('getApiKey')->willReturn('test-api-key');
        $config->method('getGuid')->willReturn('test-guid');
        $config->method('getApiHost')->willReturn('https://api.synerise.com');
        $config->method('getTimeout')->willReturn(30.0);
        $config->method('getUserAgent')->willReturn('TestAgent/1.0');
        $config->method('isKeepAliveEnabled')->willReturn(false);

        return $config;
    }
}
