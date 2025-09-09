<?php

namespace Synerise\Sdk\Api\Cache;

interface TokenCacheInterface
{
    /**
     * Get cached token if valid
     */
    public function getToken(string $key): ?string;

    /**
     * Store token with TTL in seconds
     */
    public function setToken(string $key, string $token, int $ttl): void;

    /**
     * Clear cached token
     */
    public function clearToken(string $key): void;
}