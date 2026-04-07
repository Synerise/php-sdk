<?php

declare(strict_types=1);

namespace Synerise\Sdk\Guzzle;

use Synerise\Sdk\Api\Config;
use Synerise\Sdk\Guzzle\Middleware\LogMiddlewareFactory;
use Synerise\Sdk\Guzzle\Middleware\RetryMiddlewareFactory;

class DefaultMiddlewareFactory implements MiddlewareFactoryInterface
{
    /**
     * @var RetryMiddlewareFactory|null
     */
    private ?RetryMiddlewareFactory $retryMiddlewareFactory;

    /**
     * @var LogMiddlewareFactory|null
     */
    private ?LogMiddlewareFactory $logMiddlewareFactory;

    /**
     * @param RetryMiddlewareFactory|null $retryMiddlewareFactory
     * @param LogMiddlewareFactory|null $logMiddlewareFactory
     */
    public function __construct(
        ?RetryMiddlewareFactory $retryMiddlewareFactory = null,
        ?LogMiddlewareFactory $logMiddlewareFactory = null,
    ) {
        $this->retryMiddlewareFactory = $retryMiddlewareFactory;
        $this->logMiddlewareFactory = $logMiddlewareFactory;
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

        if ($this->logMiddlewareFactory != null && $config->isRequestLoggingEnabled()) {
            $middlewares['logMiddleware'] = $this->logMiddlewareFactory->create();
        }

        return $middlewares;
    }
}
