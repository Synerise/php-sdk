<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\Authentication;

use Microsoft\Kiota\Abstractions\RequestInformation;
use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Api\Authentication\BasicAuthenticationProvider;
use Synerise\Sdk\Api\Config;

class BasicAuthenticationProviderTest extends TestCase
{
    public function testAuthenticateRequestShouldAddAuthorizationHeader(): void
    {
        $config = $this->createMock(Config::class);
        $config->method('getGuid')->willReturn('test-guid');
        $config->method('getApiKey')->willReturn('test-api-key');

        $provider = new BasicAuthenticationProvider($config);

        $request = new RequestInformation();
        $request->urlTemplate = 'https://api.synerise.com/v4/test';

        $promise = $provider->authenticateRequest($request);
        $result = $promise->wait();

        $authHeader = $result->getHeaders()->get('Authorization');
        $expectedToken = base64_encode('test-guid:test-api-key');
        $this->assertContains("Basic {$expectedToken}", $authHeader);
    }

    public function testAuthenticateRequestShouldNotOverwriteExistingHeader(): void
    {
        $config = $this->createMock(Config::class);
        $config->method('getGuid')->willReturn('guid');
        $config->method('getApiKey')->willReturn('key');

        $provider = new BasicAuthenticationProvider($config);

        $request = new RequestInformation();
        $request->urlTemplate = 'https://api.synerise.com/v4/test';
        $request->addHeader('Authorization', 'Bearer existing-token');

        $promise = $provider->authenticateRequest($request);
        $result = $promise->wait();

        $authHeader = $result->getHeaders()->get('Authorization');
        $this->assertContains('Bearer existing-token', $authHeader);
    }
}
