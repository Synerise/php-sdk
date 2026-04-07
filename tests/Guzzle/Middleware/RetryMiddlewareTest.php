<?php

declare(strict_types=1);

namespace Synerise\Tests\Guzzle\Middleware;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Api\Authentication\AuthenticationWithRetryProvider;
use Synerise\Sdk\Guzzle\Middleware\RetryMiddleware;

class RetryMiddlewareTest extends TestCase
{
    public function testReturnsResponseOnSuccess(): void
    {
        $authProvider = $this->createMock(AuthenticationWithRetryProvider::class);
        $middleware = new RetryMiddleware($authProvider);

        $response = new Response(200);
        $handler = function () use ($response) {
            return new FulfilledPromise($response);
        };

        $result = $middleware($handler)(new Request('GET', 'https://example.com'), []);

        $this->assertSame($response, $result->wait());
    }

    public function testRetriesOn401Response(): void
    {
        $request = new Request('GET', 'https://example.com');
        $retryRequest = new Request('GET', 'https://example.com');
        $successResponse = new Response(200);

        $authProvider = $this->createMock(AuthenticationWithRetryProvider::class);
        $authProvider->expects($this->once())
            ->method('reauthorizeRequest')
            ->with($request)
            ->willReturn($retryRequest);

        $middleware = new RetryMiddleware($authProvider);

        $callCount = 0;
        $handler = function ($req) use (&$callCount, $successResponse) {
            $callCount++;
            if ($callCount === 1) {
                return new FulfilledPromise(new Response(401));
            }
            return new FulfilledPromise($successResponse);
        };

        $result = $middleware($handler)($request, []);

        $this->assertSame($successResponse, $result->wait());
        $this->assertSame(2, $callCount);
    }

    public function testRetriesOn401RejectionException(): void
    {
        $request = new Request('GET', 'https://example.com');
        $retryRequest = new Request('GET', 'https://example.com');
        $successResponse = new Response(200);

        $authProvider = $this->createMock(AuthenticationWithRetryProvider::class);
        $authProvider->expects($this->once())
            ->method('reauthorizeRequest')
            ->with($request)
            ->willReturn($retryRequest);

        $middleware = new RetryMiddleware($authProvider);

        $callCount = 0;
        $handler = function ($req) use (&$callCount, $request, $successResponse) {
            $callCount++;
            if ($callCount === 1) {
                $exception = RequestException::create($request, new Response(401));
                return new RejectedPromise($exception);
            }
            return new FulfilledPromise($successResponse);
        };

        $result = $middleware($handler)($request, []);

        $this->assertSame($successResponse, $result->wait());
        $this->assertSame(2, $callCount);
    }

    public function testDoesNotExceedMaxRetries(): void
    {
        $request = new Request('GET', 'https://example.com');
        $retryRequest = new Request('GET', 'https://example.com');

        $authProvider = $this->createMock(AuthenticationWithRetryProvider::class);
        $authProvider->expects($this->once())
            ->method('reauthorizeRequest')
            ->willReturn($retryRequest);

        $middleware = new RetryMiddleware($authProvider, null, 1);

        $handler = function () {
            return new FulfilledPromise(new Response(401));
        };

        $result = $middleware($handler)($request, []);

        $this->assertSame(401, $result->wait()->getStatusCode());
    }
}
