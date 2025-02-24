<?php

namespace Synerise\Sdk\Guzzle;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Microsoft\Kiota\Http\KiotaClientFactory;
use Synerise\Sdk\Api\Config;

class ClientFactory
{
    /**
     * @var Config
     */
    private Config $apiConfig;

    /**
     * @param Config $apiConfig
     */
    public function __construct(Config $apiConfig)
    {
        $this->apiConfig = $apiConfig;
    }

    /**
     * @param array $middlewares
     * @return Client
     */
    public function create(array $middlewares = []): Client
    {
        $options = [
            'headers' => $this->prepareHeaders(),
            'connect_timeout' => $this->apiConfig->getTimeout(),
            'timeout' => $this->apiConfig->getTimeout(),
        ];

        if (!empty($middlewares)) {
            $options['handler'] = $this->prepareHandler($middlewares);
        }

        return KiotaClientFactory::createWithConfig($options);
    }

    /**
     * @param array $middlewares
     * @return HandlerStack
     */
    protected function prepareHandler(array $middlewares): HandlerStack
    {
        /** @todo: check if this is necessary */
        $handlerStack = KiotaClientFactory::getDefaultHandlerStack();
        foreach ($middlewares as $key => $middleware) {
            $handlerStack->push($middleware, $key);
        }
        return $handlerStack;
    }

    /**
     * Get default headers
     * @return string[]
     */
    protected function prepareHeaders(): array
    {
        $headers = [
            'User-Agent' => $this->apiConfig->getUserAgent(),
            'Api-Version' => '4.4'
        ];

        if ($this->apiConfig->isKeepAliveEnabled()) {
            $headers['Connection'] = [ 'keep-alive' ];
        }

        return $headers;
    }
}