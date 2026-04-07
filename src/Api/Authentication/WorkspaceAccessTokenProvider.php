<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Authentication;

use Http\Promise\FulfilledPromise;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\Authentication\AccessTokenProvider;
use Microsoft\Kiota\Abstractions\Authentication\AllowedHostsValidator;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\Uauth\Models\BusinessProfileAuthenticationRequest;
use Synerise\Api\Uauth\Models\TokenResponse;
use Synerise\Api\Uauth\Uauth;
use Synerise\Sdk\Api\Cache\InMemoryTokenCache;
use Synerise\Sdk\Api\Cache\TokenCacheInterface;
use Synerise\Sdk\Api\Config;

class WorkspaceAccessTokenProvider implements AccessTokenProvider
{
    /**
     * Api Config
     *
     * @var Config
     */
    protected Config $config;

    /**
     * Request adapter
     *
     * @var RequestAdapter
     */
    private RequestAdapter $requestAdapter;

    /**
     * Token cache
     *
     * @var TokenCacheInterface
     */
    private TokenCacheInterface $tokenCache;

    /**
     * Key for storing token
     *
     * @var string
     */
    private string $cacheKey;

    /**
     * Cache time to live
     *
     * @var int
     */
    private int $ttl;

    /**
     * Pick an authentication provider by config. If no request adapter provided, then it will be created by config.
     * @param Config $config
     * @param RequestAdapter $requestAdapter
     * @param TokenCacheInterface|null $tokenCache
     * @param int $ttl
     */
    public function __construct(
        Config $config,
        RequestAdapter $requestAdapter,
        ?TokenCacheInterface $tokenCache = null,
        int $ttl = 3550,
    ) {
        $requestAdapter->setBaseUrl($config->getApiHost() . '/uauth');

        $this->requestAdapter = $requestAdapter;
        $this->config = $config;
        $this->tokenCache = $tokenCache ?: new InMemoryTokenCache();
        $this->cacheKey = 'synerise_token_' . md5((string) $config->getApiKey());
        $this->ttl = $ttl;
    }

    /**
     * @inheritDoc
     */
    public function getAuthorizationTokenAsync(string $url, array $additionalAuthenticationContext = []): Promise
    {
        // Try to get cached token
        $cachedToken = $this->tokenCache->getToken($this->cacheKey);
        if ($cachedToken) {
            return new FulfilledPromise($cachedToken);
        }

        // Fetch new token
        $request = new BusinessProfileAuthenticationRequest();
        $request->setApiKey($this->config->getApiKey());

        $client = new Uauth($this->requestAdapter);
        $promise = $client->v2()->auth()->login()->profile()->post($request);

        return $promise->then(function (?TokenResponse $response) {
            if ($response === null) {
                return null;
            }
            $this->cacheToken($response);
            return $response->getToken();
        });
    }

    /**
     * @inheritDoc
     */
    private function cacheToken(TokenResponse $response): void
    {
        if ($response->getToken()) {
            $this->tokenCache->setToken($this->cacheKey, $response->getToken(), $this->ttl);
        }
    }

    /**
     * @inheritDoc
     */
    public function getAllowedHostsValidator(): AllowedHostsValidator
    {
        return new AllowedHostsValidator();
    }

    /**
     * @inheritDoc
     */
    public function clearCache(): void
    {
        $this->tokenCache->clearToken($this->cacheKey);
    }
}
