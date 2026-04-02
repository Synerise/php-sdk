<?php

declare(strict_types=1);

namespace Synerise\Sdk\Guzzle;

use Synerise\Sdk\Api\Config;

interface MiddlewareFactoryInterface
{
    /**
     * Create an array of middlewares
     *
     * @param Config $config
     * @return array<string, callable>
     */
    public function create(Config $config): array;
}
