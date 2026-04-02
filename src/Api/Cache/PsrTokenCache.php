<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Cache;

use Psr\Log\LoggerInterface;
use Psr\SimpleCache\CacheInterface;

class PsrTokenCache implements TokenCacheInterface
{
    private CacheInterface $cache;
    private ?LoggerInterface $logger;

    public function __construct(CacheInterface $cache, ?LoggerInterface $logger = null)
    {
        $this->cache = $cache;
        $this->logger = $logger;
    }

    public function getToken(string $key): ?string
    {
        try {
            return $this->cache->get($key);
        } catch (\Exception $e) {
            if ($this->logger) {
                $this->logger->warning('Failed to get token from cache', ['key' => $key, 'exception' => $e]);
            }
            return null;
        }
    }

    public function setToken(string $key, string $token, int $ttl): void
    {
        try {
            $this->cache->set($key, $token, $ttl);
        } catch (\Exception $e) {
            if ($this->logger) {
                $this->logger->warning('Failed to set token in cache', ['key' => $key, 'exception' => $e]);
            }
        }
    }

    public function clearToken(string $key): void
    {
        try {
            $this->cache->delete($key);
        } catch (\Exception $e) {
            if ($this->logger) {
                $this->logger->warning('Failed to clear token from cache', ['key' => $key, 'exception' => $e]);
            }
        }
    }
}
