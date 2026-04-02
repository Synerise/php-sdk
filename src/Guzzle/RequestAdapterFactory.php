<?php

declare(strict_types=1);

namespace Synerise\Sdk\Guzzle;

use Microsoft\Kiota\Abstractions\Authentication\AuthenticationProvider;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Abstractions\Serialization\ParseNodeFactory;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriterFactory;
use Microsoft\Kiota\Http\GuzzleRequestAdapter;
use Microsoft\Kiota\Serialization\Json\JsonParseNodeFactory;
use Microsoft\Kiota\Serialization\Json\JsonSerializationWriterFactory;
use Synerise\Sdk\Api\Config;

class RequestAdapterFactory implements RequestAdapterFactoryInterface
{
    /**
     * @var ClientFactory
     */
    private ClientFactory $guzzleClientFactory;

    public function __construct(
        ClientFactory $guzzleClientFactory
    ) {
        $this->guzzleClientFactory = $guzzleClientFactory;
    }

    /**
     * @inheritdoc
     * @param array<string, callable> $middlewares
     */
    public function create(
        Config $config,
        AuthenticationProvider $authenticationProvider,
        array $middlewares = [],
        ?ParseNodeFactory $parseNodeFactory = null,
        ?SerializationWriterFactory $serializationWriterFactory = null
    ): RequestAdapter {
        return new GuzzleRequestAdapter(
            $authenticationProvider,
            $parseNodeFactory ?: new JsonParseNodeFactory(),
            $serializationWriterFactory ?: new JsonSerializationWriterFactory(),
            $this->guzzleClientFactory->create($config, $middlewares)
        );
    }
}
