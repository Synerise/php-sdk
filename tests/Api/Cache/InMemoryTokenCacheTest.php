<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\Cache;

use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Api\Cache\InMemoryTokenCache;

class InMemoryTokenCacheTest extends TestCase
{
    public function testSetAndGetToken(): void
    {
        $cache = new InMemoryTokenCache();
        $cache->setToken('key1', 'token1', 3600);

        $this->assertSame('token1', $cache->getToken('key1'));
    }

    public function testGetTokenReturnsNullWhenNotSet(): void
    {
        $cache = new InMemoryTokenCache();

        $this->assertNull($cache->getToken('nonexistent'));
    }

    public function testClearToken(): void
    {
        $cache = new InMemoryTokenCache();
        $cache->setToken('key1', 'token1', 3600);
        $cache->clearToken('key1');

        $this->assertNull($cache->getToken('key1'));
    }

    public function testExpiredTokenReturnsNull(): void
    {
        $cache = new InMemoryTokenCache();
        $cache->setToken('key1', 'token1', 0);

        $this->assertNull($cache->getToken('key1'));
    }

    public function testInstancesAreIsolated(): void
    {
        $cache1 = new InMemoryTokenCache();
        $cache2 = new InMemoryTokenCache();

        $cache1->setToken('key1', 'token1', 3600);

        $this->assertSame('token1', $cache1->getToken('key1'));
        $this->assertNull($cache2->getToken('key1'));
    }
}
