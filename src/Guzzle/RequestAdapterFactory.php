<?php

namespace Synerise\Sdk\Guzzle;

use Microsoft\Kiota\Abstractions\Authentication\AuthenticationProvider;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\Serialization\ParseNodeFactory;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriterFactory;
use Microsoft\Kiota\Http\GuzzleRequestAdapter;
use Microsoft\Kiota\Serialization\Json\JsonParseNodeFactory;
use Microsoft\Kiota\Serialization\Json\JsonSerializationWriterFactory;
use Synerise\Sdk\Api\Config;
use Synerise\Sdk\Guzzle\Middleware\LogMiddlewareFactory;
use Synerise\Sdk\Guzzle\Middleware\RetryMiddlewareFactory;

class RequestAdapterFactory implements RequestAdapterFactoryInterface
{
    /**
     * @var ClientFactory
     */
    private ClientFactory $guzzleClientFactory;

    /**
     * @var LogMiddlewareFactory|null
     */
    private ?LogMiddlewareFactory $logMiddlewareFactory;

    /**
     * @var RetryMiddlewareFactory|null
     */
    private ?RetryMiddlewareFactory $retryMiddlewareFactory;

    public function __construct(
        ClientFactory $guzzleClientFactory,
        ?LogMiddlewareFactory $logMiddlewareFactory = null,
        ?RetryMiddlewareFactory $retryMiddlewareFactory = null
    ) {
        $this->guzzleClientFactory = $guzzleClientFactory;
        $this->logMiddlewareFactory = $logMiddlewareFactory;
        $this->retryMiddlewareFactory = $retryMiddlewareFactory;
    }

    /**
     * @inheritdoc
     */
    public function create(
        Config $config,
        AuthenticationProvider $authenticationProvider,
        array $middlewares = [],
        ?ParseNodeFactory $parseNodeFactory = null,
        ?SerializationWriterFactory $serializationWriterFactory = null
    ): RequestAdapter
    {
        if ($this->retryMiddlewareFactory != null) {
            $middlewares['retryMiddleware'] = $this->retryMiddlewareFactory->create($authenticationProvider);
        }

        if ($this->logMiddlewareFactory != null && $config->isRequestLoggingEnabled()) {
            $middlewares['logMiddleware'] = $this->logMiddlewareFactory->create();
        }

        return new GuzzleRequestAdapter(
            $authenticationProvider,
            $parseNodeFactory ?: new JsonParseNodeFactory(),
            $serializationWriterFactory ?: new JsonSerializationWriterFactory(),
            $this->guzzleClientFactory->create($config, $middlewares)
        );
    }
}
