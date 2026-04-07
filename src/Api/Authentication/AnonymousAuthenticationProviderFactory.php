<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Authentication;

use Microsoft\Kiota\Abstractions\Authentication\AnonymousAuthenticationProvider;
use Microsoft\Kiota\Abstractions\Authentication\AuthenticationProvider;
use Synerise\Sdk\Api\Config;

class AnonymousAuthenticationProviderFactory implements AuthenticationProviderFactoryInterface
{
    public function create(Config $config): AuthenticationProvider
    {
        return new AnonymousAuthenticationProvider();
    }

    public function get(Config $config): AuthenticationProvider
    {
        return $this->create($config);
    }
}
