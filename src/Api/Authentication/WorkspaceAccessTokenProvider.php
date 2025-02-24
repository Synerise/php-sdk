<?php

namespace Synerise\Sdk\Api\Authentication;

use Exception;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\ApiException;
use Microsoft\Kiota\Abstractions\Authentication\AccessTokenProvider;
use Microsoft\Kiota\Abstractions\Authentication\AllowedHostsValidator;
use Microsoft\Kiota\Abstractions\Authentication\AnonymousAuthenticationProvider;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Synerise\Api\Authentication\Auth\Login\Profile\ProfilePostRequestBody;
use Synerise\Api\Authentication\Authentication;
use Synerise\Sdk\Api\Config;
use Synerise\Sdk\Exception\AuthenticationException;
use Synerise\Sdk\Guzzle\RequestAdapterFactory;

class WorkspaceAccessTokenProvider implements AccessTokenProvider
{
    /**
     * Api Config
     *
     * @var Config
     */
    protected Config $config;

    /**
     * @var RequestAdapter
     */
    private RequestAdapter $requestAdapter;

    /**
     * Pick authentication provider by config. If no request adapter provided, then it will be created by config.
     * @param Config $config
     * @param RequestAdapter|null $requestAdapter
     */
    public function __construct(Config $config, ?RequestAdapter $requestAdapter = null)
    {
        if (!$requestAdapter) {
            $requestAdapterFactory = new RequestAdapterFactory($config);
            $requestAdapter = $requestAdapterFactory->create(new AnonymousAuthenticationProvider());
        }
        $requestAdapter->setBaseUrl($config->getApiHost() . '/v4');

        $this->requestAdapter = $requestAdapter;
        $this->config = $config;
    }

    /**
     * @inheritDoc
     */
    public function getAuthorizationTokenAsync(string $url, array $additionalAuthenticationContext = []): Promise
    {
        $request = new ProfilePostRequestBody();
        $request->setApiKey($this->config->getApiKey());

        $client = new Authentication($this->requestAdapter);
        return $client->auth()->login()->profile()->post($request);
    }

    /**
     * @inheritDoc
     */
    public function getAllowedHostsValidator(): AllowedHostsValidator
    {
        return new AllowedHostsValidator();
    }
}