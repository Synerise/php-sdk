<?php

namespace Synerise\Sdk\Api\Cache;

class InMemoryTokenCache implements TokenCacheInterface
{
    private static array $tokens = [];
    private static array $expirations = [];

    public function getToken(string $key): ?string
    {
        if (isset(self::$tokens[$key]) && isset(self::$expirations[$key])) {
            if (time() < self::$expirations[$key]) {
                return self::$tokens[$key];
            }
            // Clean up expired token
            unset(self::$tokens[$key], self::$expirations[$key]);
        }
        return null;
    }

    public function setToken(string $key, string $token, int $ttl): void
    {
        self::$tokens[$key] = $token;
        self::$expirations[$key] = time() + $ttl;
    }

    public function clearToken(string $key): void
    {
        unset(self::$tokens[$key], self::$expirations[$key]);
    }
}
