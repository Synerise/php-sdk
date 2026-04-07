<?php

declare(strict_types=1);

namespace Synerise\Sdk\Guzzle\Middleware;

use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use Microsoft\Kiota\Abstractions\Authentication\AuthenticationProvider;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Synerise\Sdk\Api\Authentication\AuthenticationWithRetryProvider;

class RetryMiddleware
{
    private AuthenticationProvider $authenticationProvider;

    private ?LoggerInterface $logger;
    private int $maxRetries;

    public function __construct(
        AuthenticationProvider $authenticationProvider,
        ?LoggerInterface $logger = null,
        int $maxRetries = 1,
    ) {
        $this->authenticationProvider = $authenticationProvider;
        $this->logger = $logger;
        $this->maxRetries = $maxRetries;
    }

    public function __invoke(callable $handler): callable
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            $retryCount = 0;

            $attemptRequest = function (RequestInterface $currentRequest) use ($handler, $options, &$retryCount, &$attemptRequest) {
                return $handler($currentRequest, $options)->then(
                    function (ResponseInterface $response) use ($currentRequest, &$retryCount, &$attemptRequest) {
                        if ($this->authenticationProvider instanceof AuthenticationWithRetryProvider &&
                            $response->getStatusCode() === 401 &&
                            $retryCount < $this->maxRetries) {
                            return $this->retryWithReauthorization($attemptRequest, $retryCount, $currentRequest);
                        }

                        return $response;
                    },
                    function ($reason) use ($currentRequest, &$retryCount, &$attemptRequest) {
                        if ($reason instanceof ConnectException && $retryCount < $this->maxRetries) {
                            return $this->retryOnFailedConnection($attemptRequest, $retryCount, $currentRequest);
                        } elseif ($this->authenticationProvider instanceof AuthenticationWithRetryProvider &&
                            $reason instanceof RequestException &&
                            $reason->getResponse() &&
                            $reason->getResponse()->getStatusCode() === 401 &&
                            $retryCount < $this->maxRetries) {
                            return $this->retryWithReauthorization($attemptRequest, $retryCount, $currentRequest);
                        }

                        throw $reason;
                    },
                );
            };

            return $attemptRequest($request);
        };
    }

    protected function retryOnFailedConnection(
        callable &$attemptRequest,
        int &$retryCount,
        RequestInterface $currentRequest,
    ): PromiseInterface {
        $retryCount++;

        if ($this->logger) {
            $this->logger->info('Connection failed, retrying', [
                'url' => (string) $currentRequest->getUri(),
                'retry_count' => $retryCount,
            ]);
        }

        return $attemptRequest($currentRequest);
    }
    protected function retryWithReauthorization(
        callable &$attemptRequest,
        int &$retryCount,
        RequestInterface $currentRequest,
    ): PromiseInterface {
        $retryCount++;

        if ($this->logger) {
            $this->logger->info('Received 401 response, clearing token cache and retrying', [
                'url' => (string) $currentRequest->getUri(),
                'retry_count' => $retryCount,
            ]);
        }

        if ($this->authenticationProvider instanceof AuthenticationWithRetryProvider) {
            $newRequest = $this->authenticationProvider->reauthorizeRequest($currentRequest);
            return $attemptRequest($newRequest);
        }

        return $attemptRequest($currentRequest);
    }
}
