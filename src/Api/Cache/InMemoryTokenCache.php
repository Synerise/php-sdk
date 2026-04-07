<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Cache;

class InMemoryTokenCache implements TokenCacheInterface
{
    /** @var array<string, string> */
    private array $tokens = [];
    /** @var array<string, int> */
    private array $expirations = [];

    public function getToken(string $key): ?string
    {
        if (isset($this->tokens[$key]) && isset($this->expirations[$key])) {
            if (time() < $this->expirations[$key]) {
                return $this->tokens[$key];
            }
            // Clean up expired token
            unset($this->tokens[$key], $this->expirations[$key]);
        }
        return null;
    }

    public function setToken(string $key, string $token, int $ttl): void
    {
        $this->tokens[$key] = $token;
        $this->expirations[$key] = time() + $ttl;
    }

    public function clearToken(string $key): void
    {
        unset($this->tokens[$key], $this->expirations[$key]);
    }
}
