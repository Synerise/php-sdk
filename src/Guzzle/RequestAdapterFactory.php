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

class RequestAdapterFactory
{
    /**
     * @var Config
     */
    private Config $apiConfig;

    /**
     * @var ClientFactory
     */
    private ClientFactory $guzzleClientFactory;

    public function __construct(
        Config $apiConfig,
        ?ClientFactory $guzzleClientFactory = null
    )
    {
        $this->apiConfig = $apiConfig;
        $this->guzzleClientFactory = $guzzleClientFactory ?: new ClientFactory($this->apiConfig);
    }

    /**
     * Create request adapter authentication provider
     * @param AuthenticationProvider $authenticationProvider
     * @param array $middlewares
     * @param ParseNodeFactory|null $parseNodeFactory
     * @param SerializationWriterFactory|null $serializationWriterFactory
     * @return RequestAdapter
     */
    public function create(
       AuthenticationProvider $authenticationProvider,
       array $middlewares = [],
       ?ParseNodeFactory $parseNodeFactory = null,
       ?SerializationWriterFactory $serializationWriterFactory = null
    ): RequestAdapter {
        return new GuzzleRequestAdapter(
            $authenticationProvider,
            $parseNodeFactory ?: new JsonParseNodeFactory(),
            $serializationWriterFactory ?: new JsonSerializationWriterFactory(),
            $this->guzzleClientFactory->create($middlewares)
        );
    }
}