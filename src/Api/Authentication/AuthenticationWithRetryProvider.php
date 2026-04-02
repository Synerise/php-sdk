<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Authentication;

use Microsoft\Kiota\Abstractions\Authentication\AuthenticationProvider;
use Psr\Http\Message\RequestInterface;

interface AuthenticationWithRetryProvider extends AuthenticationProvider
{
    /**
     * @param RequestInterface $request
     * @param array<string, mixed> $additionalAuthenticationContext
     * @return RequestInterface
     */
    public function reauthorizeRequest(RequestInterface $request, array $additionalAuthenticationContext = []): RequestInterface;
}
