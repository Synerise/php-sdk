<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Authentication;

use Microsoft\Kiota\Abstractions\Authentication\BaseBearerTokenAuthenticationProvider;
use Psr\Http\Message\RequestInterface;

class WorkspaceBearerTokenAuthenticationProvider extends BaseBearerTokenAuthenticationProvider implements AuthenticationWithRetryProvider
{
    /**
     * @param RequestInterface $request
     * @param array<string, mixed> $additionalAuthenticationContext
     * @return RequestInterface
     */
    public function reauthorizeRequest(RequestInterface $request, array $additionalAuthenticationContext = []): RequestInterface
    {
        $this->getAccessTokenProvider()->clearCache();

        $tokenPromise = $this->getAccessTokenProvider()
            ->getAuthorizationTokenAsync((string) $request->getUri(), $additionalAuthenticationContext);

        $token = $tokenPromise->wait();

        if ($token) {
            $request = $request->withHeader('authorization', "Bearer {$token}");
        }

        return $request;
    }
}
