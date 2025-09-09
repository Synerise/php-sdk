<?php

namespace Synerise\Sdk\Api\Cache;

use Psr\SimpleCache\CacheInterface;

class PsrTokenCache implements TokenCacheInterface
{
    private CacheInterface $cache;

    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    public function getToken(string $key): ?string
    {
        try {
            return $this->cache->get($key);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function setToken(string $key, string $token, int $ttl): void
    {
        try {
            $this->cache->set($key, $token, $ttl);
        } catch (\Exception $e) {
            // Silently handle cache errors
        }
    }

    public function clearToken(string $key): void
    {
        try {
            $this->cache->delete($key);
        } catch (\Exception $e) {
            // Silently handle cache errors
        }
    }
}
