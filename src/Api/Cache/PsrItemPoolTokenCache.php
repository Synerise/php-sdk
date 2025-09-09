<?php

namespace Synerise\Sdk\Api\Cache;

use Psr\Cache\CacheItemPoolInterface;

class PsrItemPoolTokenCache implements TokenCacheInterface
{
    private CacheItemPoolInterface $cache;

    public function __construct(CacheItemPoolInterface $cache)
    {
        $this->cache = $cache;
    }

    public function getToken(string $key): ?string
    {
        try {
            $item = $this->cache->getItem($key);
            return $item->isHit() ? $item->get() : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function setToken(string $key, string $token, int $ttl): void
    {
        try {
            $item = $this->cache->getItem($key);
            $item->set($token);
            $item->expiresAfter($ttl);
            $this->cache->save($item);
        } catch (\Exception $e) {
            // Silently handle cache errors
        }
    }

    public function clearToken(string $key): void
    {
        try {
            $this->cache->deleteItem($key);
        } catch (\Exception $e) {
            // Silently handle cache errors
        }
    }
}
