<?php

namespace Synerise\Sdk\Api\Authentication;

use Microsoft\Kiota\Abstractions\Authentication\AnonymousAuthenticationProvider;
use Microsoft\Kiota\Abstractions\Authentication\AuthenticationProvider;
use Synerise\Sdk\Api\Config;
use Synerise\Sdk\Api\Cache\TokenCacheInterface;
use Synerise\Sdk\Guzzle\RequestAdapterFactoryInterface;
use Synerise\Sdk\Model\AuthenticationMethodInterface;

class AuthenticationProviderFactory
{
    /**
     * @var RequestAdapterFactoryInterface
     */
    private RequestAdapterFactoryInterface $requestAdapterFactory;

    /**
     * @var TokenCacheInterface|null
     */
    private ?TokenCacheInterface $tokenCache;

    /**
     * Authentication provider
     * @var AuthenticationProvider[]
     */
    private array $authenticationProvider = [];

    private int $ttl;

    /**
     * Authentication provider factory.
     * @param RequestAdapterFactoryInterface $requestAdapterFactory Used for obtaining JWT.
     * @param TokenCacheInterface|null $tokenCache Token cache implementation, defaults to InMemoryTokenCache
     * @param int $ttl
     */
    public function __construct(
        RequestAdapterFactoryInterface $requestAdapterFactory,
        ?TokenCacheInterface $tokenCache = null,
        int $ttl = 3550
    )
    {
        $this->requestAdapterFactory = $requestAdapterFactory;
        $this->tokenCache = $tokenCache;
        $this->ttl = $ttl;
    }

    /**
     * Create authentication provider by config
     * @param Config $config
     * @return AuthenticationProvider
     */
    public function create(Config $config): AuthenticationProvider
    {
        switch ($config->getAuthenticationMethod()->value()) {
            case AuthenticationMethodInterface::BASIC_VALUE:
                return $this->getBasicAuthenticationProvider($config);
            case AuthenticationMethodInterface::BEARER_VALUE:
                return $this->getWorkspaceBearerTokenAuthenticationProvider($config);
            default:
                return new AnonymousAuthenticationProvider();
        }
    }

    /**
     * Get authentication provider by config
     * @param Config $config
     * @return AuthenticationProvider
     */
    public function get(Config $config): AuthenticationProvider
    {
        if (!$config->getApiKey()) {
            throw new \InvalidArgumentException('API key is required');
        }

        if (!isset($this->authenticationProvider[$config->getApiKey()])) {
            $this->authenticationProvider[$config->getApiKey()] = $this->create($config);
        }
        return $this->authenticationProvider[$config->getApiKey()];
    }

    /**
     * Get Basic authentication Provider
     * @param Config $config
     * @return BasicAuthenticationProvider
     */
    public function getBasicAuthenticationProvider(Config $config): BasicAuthenticationProvider
    {
        return new BasicAuthenticationProvider($config);
    }

    /**
     * Get workspace Bearer token authentication Provider
     * @param Config $config
     * @return WorkspaceBearerTokenAuthenticationProvider
     */
    public function getWorkspaceBearerTokenAuthenticationProvider(Config $config): WorkspaceBearerTokenAuthenticationProvider
    {
        $requestAdapter = $this->requestAdapterFactory->create($config, new AnonymousAuthenticationProvider());

        return new WorkspaceBearerTokenAuthenticationProvider(
            new WorkspaceAccessTokenProvider($config, $requestAdapter, $this->tokenCache, $this->ttl),
        );
    }
}
