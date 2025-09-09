<?php

namespace Synerise\Sdk\Api\Authentication;

use Microsoft\Kiota\Abstractions\Authentication\AuthenticationProvider;
use Psr\Http\Message\RequestInterface;

interface AuthenticationWithRetryProvider extends AuthenticationProvider
{
    public function reauthorizeRequest(RequestInterface $request, $additionalAuthenticationContext = []): RequestInterface;
}