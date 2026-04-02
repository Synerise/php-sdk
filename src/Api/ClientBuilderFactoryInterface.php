<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api;

use Microsoft\Kiota\Abstractions\RequestAdapter;

interface ClientBuilderFactoryInterface
{
    public function create(?Config $config, ?RequestAdapter $requestAdapter = null): ?ClientBuilder;
}
