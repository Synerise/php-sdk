<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Authentication;

use Microsoft\Kiota\Abstractions\Authentication\AuthenticationProvider;
use Synerise\Sdk\Api\Config;

interface AuthenticationProviderFactoryInterface
{
    /**
     * Create authentication provider by config
     * @param Config $config
     * @return AuthenticationProvider
     */
    public function create(Config $config): AuthenticationProvider;

    /**
     * Get authentication provider by config
     * @param Config $config
     * @return AuthenticationProvider
     */
    public function get(Config $config): AuthenticationProvider;
}
