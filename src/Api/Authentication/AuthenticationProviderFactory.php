<?php

namespace Synerise\Sdk\Api\Authentication;

use Microsoft\Kiota\Abstractions\Authentication\AnonymousAuthenticationProvider;
use Microsoft\Kiota\Abstractions\Authentication\AuthenticationProvider;
use Microsoft\Kiota\Abstractions\Authentication\BaseBearerTokenAuthenticationProvider;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Sdk\Api\Config;
use Synerise\Sdk\Model\AuthenticationMethodLegacyEnum;

class AuthenticationProviderFactory
{
    /**
     * Api Config
     * @var Config
     */
    private Config $config;

    /**
     * @var RequestAdapter|null
     */
    private ?RequestAdapter $requestAdapter;

    /**
     * Authentication provider
     * @var AuthenticationProvider|null
     */
    private ?AuthenticationProvider $authenticationProvider = null;

    /**
     * Authentication provider factory.
     * @param Config $config
     * @param RequestAdapter|null $requestAdapter Used for obtaining JWT.
     */
    public function __construct(Config $config, ?RequestAdapter $requestAdapter = null)
    {
        $this->config = $config;
        $this->requestAdapter = $requestAdapter;
    }

    /**
     * Create authentication provider by config
     * @return AuthenticationProvider
     */
    public function create(): AuthenticationProvider
    {
        switch ($this->config->getAuthenticationMethod()->value()) {
            case \Synerise\Sdk\Model\AuthenticationMethodInterface::BASIC_VALUE:
                return $this->getBasicAuthenticationProvider();
            case \Synerise\Sdk\Model\AuthenticationMethodInterface::BEARER_VALUE:
                return $this->getWorkspaceBearerTokenAuthenticationProvider();
            default:
                return new AnonymousAuthenticationProvider();
        }
    }

    /**
     * Get authentication provider by config
     * @return AuthenticationProvider
     */
    public function get(): AuthenticationProvider
    {
        if (!$this->authenticationProvider) {
            $this->authenticationProvider = $this->create();
        }
        return $this->authenticationProvider;
    }

    /**
     * Get Basic authentication Provider
     * @return BasicAuthenticationProvider
     */
    public function getBasicAuthenticationProvider(): BasicAuthenticationProvider
    {
        return new BasicAuthenticationProvider($this->config);
    }

    /**
     * Get workspace Bearer token authentication Provider
     * @return BaseBearerTokenAuthenticationProvider
     */
    public function getWorkspaceBearerTokenAuthenticationProvider(): BaseBearerTokenAuthenticationProvider
    {
        return new BaseBearerTokenAuthenticationProvider(
            new WorkspaceAccessTokenProvider($this->config, $this->requestAdapter)
        );
    }
}
