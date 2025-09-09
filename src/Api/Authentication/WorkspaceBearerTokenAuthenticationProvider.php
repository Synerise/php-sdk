<?php

namespace Synerise\Sdk\Api\Authentication;

use Microsoft\Kiota\Abstractions\Authentication\BaseBearerTokenAuthenticationProvider;
use Psr\Http\Message\RequestInterface;

class WorkspaceBearerTokenAuthenticationProvider extends BaseBearerTokenAuthenticationProvider implements AuthenticationWithRetryProvider
{
    public function reauthorizeRequest(RequestInterface $request, $additionalAuthenticationContext = []): RequestInterface
    {
        $this->getAccessTokenProvider()->clearCache();

        $tokenPromise = $this->getAccessTokenProvider()
            ->getAuthorizationTokenAsync($request->getUri(), $additionalAuthenticationContext);

        $token = $tokenPromise->wait();

        if ($token) {
            $request = $request->withHeader('authorization', "Bearer {$token}");
        }

        return $request;
    }
}