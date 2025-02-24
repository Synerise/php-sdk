<?php

namespace Synerise\Sdk\Api\Authentication;

use Http\Promise\FulfilledPromise;
use Http\Promise\Promise;
use Microsoft\Kiota\Abstractions\Authentication\AuthenticationProvider;
use Microsoft\Kiota\Abstractions\RequestInformation;
use Synerise\Sdk\Api\Config;

class BasicAuthenticationProvider implements AuthenticationProvider
{
    /**
     * @var string $authorizationHeaderKey The Authorization header key
     */
    private static string $authorizationHeaderKey = "Authorization";

    /**
     * Claims key to search for in $additionalAuthenticationContext
     *
     * @var string
     */
    private static string $claimsKey = "claims";
    /**
     * @var Config
     */
    private Config $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @inheritDoc
     */
    public function authenticateRequest(RequestInformation $request, array $additionalAuthenticationContext = []): Promise
    {
        $token = base64_encode("{$this->config->getGuid()}:{$this->config->getApiKey()}");
        if (array_key_exists(self::$claimsKey, $additionalAuthenticationContext)
            && $request->getHeaders()->contains(self::$authorizationHeaderKey)
        ) {
            $request->getHeaders()->remove(self::$authorizationHeaderKey);
        }

        if (!$request->getHeaders()->contains(self::$authorizationHeaderKey)) {
            $request->addHeader(self::$authorizationHeaderKey, "Basic {$token}");
        }
        return new FulfilledPromise($request);
    }
}