<?php

declare(strict_types=1);

namespace Synerise\Sdk\Guzzle;

use Synerise\Sdk\Api\Config;
use Synerise\Sdk\Guzzle\Middleware\RetryMiddlewareFactory;

class AuthenticationMiddlewareFactory implements MiddlewareFactoryInterface
{
    /**
     * @var RetryMiddlewareFactory|null
     */
    private ?RetryMiddlewareFactory $retryMiddlewareFactory;

    /**
     * @param RetryMiddlewareFactory|null $retryMiddlewareFactory
     */
    public function __construct(
        ?RetryMiddlewareFactory $retryMiddlewareFactory = null,
    ) {
        $this->retryMiddlewareFactory = $retryMiddlewareFactory;
    }

    /**
     * @inheritDoc
     * @return array<string, callable>
     */
    public function create(Config $config): array
    {
        $middlewares = [];
        if ($this->retryMiddlewareFactory != null) {
            $middlewares['retryMiddleware'] = $this->retryMiddlewareFactory->create($config);
        }

        return $middlewares;
    }
}
