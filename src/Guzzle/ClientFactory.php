<?php

namespace Synerise\Sdk\Guzzle;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Loguzz\Middleware\LogMiddleware;
use Microsoft\Kiota\Http\KiotaClientFactory;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Synerise\Sdk\Api\Config;

class ClientFactory
{
    /**
     * @var Config
     */
    private Config $apiConfig;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param Config $apiConfig
     * @param LoggerInterface|null $logger
     */
    public function __construct(Config $apiConfig, ?LoggerInterface $logger = null)
    {
        $this->apiConfig = $apiConfig;
        $this->logger = $logger ?: new NullLogger();
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
            'handler' => $this->prepareHandler($middlewares)
        ];

        return KiotaClientFactory::createWithConfig($options);
    }

    /**
     * @param array $middlewares
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

        if ($this->apiConfig->isRequestLoggingEnabled()) {
            $logMiddleware = new LogMiddleware(
                $this->logger,
                ['request_formatter' => new RequestCurlSanitizedFormatter()]
            );

            $handlerStack->push($logMiddleware, 'syneriseLogMiddleware');
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
            $headers['Connection'] = ['keep-alive'];
        }

        return $headers;
    }
}
