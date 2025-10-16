<?php

namespace Synerise\Sdk\Guzzle;

use Synerise\Sdk\Api\Config;

interface MiddlewareFactoryInterface
{
    /**
     * Create an array of middlewares
     *
     * @param Config $config
     * @return array
     */
    public function create(Config $config): array;
}