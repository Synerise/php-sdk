<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Cache;

use Exception;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;

class PsrItemPoolTokenCache implements TokenCacheInterface
{
    private CacheItemPoolInterface $cache;
    private ?LoggerInterface $logger;

    public function __construct(CacheItemPoolInterface $cache, ?LoggerInterface $logger = null)
    {
        $this->cache = $cache;
        $this->logger = $logger;
    }

    public function getToken(string $key): ?string
    {
        try {
            $item = $this->cache->getItem($key);
            if (!$item->isHit()) {
                return null;
            }
            $value = $item->get();
            return is_string($value) ? $value : null;
        } catch (Exception $e) {
            if ($this->logger) {
                $this->logger->warning('Failed to get token from cache', ['key' => $key, 'exception' => $e]);
            }
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
        } catch (Exception $e) {
            if ($this->logger) {
                $this->logger->warning('Failed to set token in cache', ['key' => $key, 'exception' => $e]);
            }
        }
    }

    public function clearToken(string $key): void
    {
        try {
            $this->cache->deleteItem($key);
        } catch (Exception $e) {
            if ($this->logger) {
                $this->logger->warning('Failed to clear token from cache', ['key' => $key, 'exception' => $e]);
            }
        }
    }
}
