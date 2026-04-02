<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\Cache;

use Exception;
use PHPUnit\Framework\TestCase;
use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;
use Synerise\Sdk\Api\Cache\PsrItemPoolTokenCache;

class PsrItemPoolTokenCacheTest extends TestCase
{
    public function testGetTokenShouldReturnValueOnHit(): void
    {
        $item = $this->createMock(CacheItemInterface::class);
        $item->method('isHit')->willReturn(true);
        $item->method('get')->willReturn('cached_token');

        $pool = $this->createMock(CacheItemPoolInterface::class);
        $pool->method('getItem')->with('key')->willReturn($item);

        $cache = new PsrItemPoolTokenCache($pool);

        $this->assertSame('cached_token', $cache->getToken('key'));
    }

    public function testGetTokenShouldReturnNullOnMiss(): void
    {
        $item = $this->createMock(CacheItemInterface::class);
        $item->method('isHit')->willReturn(false);

        $pool = $this->createMock(CacheItemPoolInterface::class);
        $pool->method('getItem')->willReturn($item);

        $cache = new PsrItemPoolTokenCache($pool);

        $this->assertNull($cache->getToken('key'));
    }

    public function testGetTokenShouldReturnNullOnException(): void
    {
        $pool = $this->createMock(CacheItemPoolInterface::class);
        $pool->method('getItem')->willThrowException(new Exception('Pool error'));

        $cache = new PsrItemPoolTokenCache($pool);

        $this->assertNull($cache->getToken('key'));
    }

    public function testSetTokenShouldSaveItemWithTtl(): void
    {
        $item = $this->createMock(CacheItemInterface::class);
        $item->expects($this->once())->method('set')->with('token_value');
        $item->expects($this->once())->method('expiresAfter')->with(3600);

        $pool = $this->createMock(CacheItemPoolInterface::class);
        $pool->method('getItem')->with('key')->willReturn($item);
        $pool->expects($this->once())->method('save')->with($item);

        $cache = new PsrItemPoolTokenCache($pool);
        $cache->setToken('key', 'token_value', 3600);
    }

    public function testSetTokenShouldNotThrowOnException(): void
    {
        $pool = $this->createMock(CacheItemPoolInterface::class);
        $pool->method('getItem')->willThrowException(new Exception('Pool error'));

        $cache = new PsrItemPoolTokenCache($pool);
        $cache->setToken('key', 'token', 60);

        $this->assertTrue(true);
    }

    public function testClearTokenShouldDeleteItem(): void
    {
        $pool = $this->createMock(CacheItemPoolInterface::class);
        $pool->expects($this->once())->method('deleteItem')->with('key');

        $cache = new PsrItemPoolTokenCache($pool);
        $cache->clearToken('key');
    }

    public function testClearTokenShouldNotThrowOnException(): void
    {
        $pool = $this->createMock(CacheItemPoolInterface::class);
        $pool->method('deleteItem')->willThrowException(new Exception('Pool error'));

        $cache = new PsrItemPoolTokenCache($pool);
        $cache->clearToken('key');

        $this->assertTrue(true);
    }
}
