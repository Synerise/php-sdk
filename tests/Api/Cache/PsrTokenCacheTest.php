<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\Cache;

use Exception;
use PHPUnit\Framework\TestCase;
use Psr\SimpleCache\CacheInterface;
use Synerise\Sdk\Api\Cache\PsrTokenCache;

class PsrTokenCacheTest extends TestCase
{
    public function testGetTokenShouldReturnCachedValue(): void
    {
        $cache = $this->createMock(CacheInterface::class);
        $cache->method('get')->with('token_key')->willReturn('cached_token');

        $tokenCache = new PsrTokenCache($cache);

        $this->assertSame('cached_token', $tokenCache->getToken('token_key'));
    }

    public function testGetTokenShouldReturnNullWhenNotCached(): void
    {
        $cache = $this->createMock(CacheInterface::class);
        $cache->method('get')->willReturn(null);

        $tokenCache = new PsrTokenCache($cache);

        $this->assertNull($tokenCache->getToken('missing_key'));
    }

    public function testGetTokenShouldReturnNullOnException(): void
    {
        $cache = $this->createMock(CacheInterface::class);
        $cache->method('get')->willThrowException(new Exception('Cache error'));

        $tokenCache = new PsrTokenCache($cache);

        $this->assertNull($tokenCache->getToken('key'));
    }

    public function testSetTokenShouldCallCacheSet(): void
    {
        $cache = $this->createMock(CacheInterface::class);
        $cache->expects($this->once())
            ->method('set')
            ->with('key', 'token_value', 3600);

        $tokenCache = new PsrTokenCache($cache);
        $tokenCache->setToken('key', 'token_value', 3600);
    }

    public function testSetTokenShouldNotThrowOnException(): void
    {
        $cache = $this->createMock(CacheInterface::class);
        $cache->method('set')->willThrowException(new Exception('Cache error'));

        $tokenCache = new PsrTokenCache($cache);
        $tokenCache->setToken('key', 'token', 60);

        $this->assertTrue(true); // No exception thrown
    }

    public function testClearTokenShouldCallCacheDelete(): void
    {
        $cache = $this->createMock(CacheInterface::class);
        $cache->expects($this->once())
            ->method('delete')
            ->with('key');

        $tokenCache = new PsrTokenCache($cache);
        $tokenCache->clearToken('key');
    }

    public function testClearTokenShouldNotThrowOnException(): void
    {
        $cache = $this->createMock(CacheInterface::class);
        $cache->method('delete')->willThrowException(new Exception('Cache error'));

        $tokenCache = new PsrTokenCache($cache);
        $tokenCache->clearToken('key');

        $this->assertTrue(true);
    }
}
