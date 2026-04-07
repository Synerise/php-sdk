<?php

declare(strict_types=1);

namespace Synerise\Sdk\Guzzle;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Microsoft\Kiota\Http\KiotaClientFactory;
use Synerise\Sdk\Api\Config;

class ClientFactory
{
    /**
     * @param Config $config
     * @param array<string, callable> $middlewares
     * @return Client
     */
    public function create(Config $config, array $middlewares = []): Client
    {
        $options = [
            'headers' => $this->prepareHeaders($config),
            'connect_timeout' => $config->getTimeout(),
            'timeout' => $config->getTimeout(),
            'handler' => $this->prepareHandler($middlewares),
        ];

        return KiotaClientFactory::createWithConfig($options);
    }

    /**
     * @param array<string, callable> $middlewares
     * @return HandlerStack
     */
    protected function prepareHandler(array $middlewares): HandlerStack
    {
        $handlerStack = KiotaClientFactory::getDefaultHandlerStack();
        if (!empty($middlewares)) {
            foreach ($middlewares as $key => $middleware) {
                $handlerStack->push($middleware, $key);
            }
        }

        return $handlerStack;
    }

    /**
     * Get default headers
     * @param Config $config
     * @return array<string, string>
     */
    protected function prepareHeaders(Config $config): array
    {
        $headers = [
            'User-Agent' => (string) $config->getUserAgent(),
            'Api-Version' => '4.4',
        ];

        if ($config->isKeepAliveEnabled()) {
            $headers['Connection'] = 'keep-alive';
        }

        return $headers;
    }
}
