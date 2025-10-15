<?php

namespace Synerise\Sdk\Guzzle;

use Microsoft\Kiota\Abstractions\Authentication\AuthenticationProvider;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\Serialization\ParseNodeFactory;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriterFactory;
use Synerise\Sdk\Api\Config;

interface RequestAdapterFactoryInterface
{
    /**
     * Create request adapter with authentication provider
     * @param Config $config
     * @param AuthenticationProvider $authenticationProvider
     * @param array $middlewares
     * @param ParseNodeFactory|null $parseNodeFactory
     * @param SerializationWriterFactory|null $serializationWriterFactory
     * @return RequestAdapter
     */
    public function create(
        Config $config,
        AuthenticationProvider $authenticationProvider,
        array $middlewares = [],
        ?ParseNodeFactory $parseNodeFactory = null,
        ?SerializationWriterFactory $serializationWriterFactory = null
    ): RequestAdapter;
}