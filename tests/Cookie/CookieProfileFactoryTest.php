<?php

declare(strict_types=1);

namespace Synerise\Tests\Cookie;

use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Cookie\Constants;
use Synerise\Sdk\Cookie\CookieProfileFactory;
use Synerise\Sdk\Exception\NotFoundException;

class CookieProfileFactoryTest extends TestCase
{
    protected function setUp(): void
    {
        // Clear cookie superglobal before each test
        $_COOKIE = [];
    }

    protected function tearDown(): void
    {
        $_COOKIE = [];
    }

    public function testCreateWithoutCookiesShouldThrowNotFoundException(): void
    {
        $factory = new CookieProfileFactory();

        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('Tracking cookies unavailable');

        $factory->create();
    }

    public function testCreateWithoutUuidCookieShouldThrowNotFoundException(): void
    {
        $_COOKIE[Constants::COOKIE_P] = 'some:data';

        $factory = new CookieProfileFactory();

        $this->expectException(NotFoundException::class);

        $factory->create();
    }

    public function testCreateWithoutPCookieShouldThrowNotFoundException(): void
    {
        $_COOKIE[Constants::COOKIE_UUID] = 'test-uuid';

        $factory = new CookieProfileFactory();

        $this->expectException(NotFoundException::class);

        $factory->create();
    }

    public function testCreateWithValidCookiesShouldReturnProfile(): void
    {
        $_COOKIE[Constants::COOKIE_UUID] = 'test-uuid-123';
        $_COOKIE[Constants::COOKIE_P] = 'identityHash:12345&userHash:67890';

        $factory = new CookieProfileFactory();
        $profile = $factory->create();

        $this->assertSame('test-uuid-123', $profile->getUuid());
        $this->assertNotNull($profile->getBaseParams());
    }

    public function testCreateWithParamsCookieShouldSetExtraParams(): void
    {
        $_COOKIE[Constants::COOKIE_UUID] = 'test-uuid';
        $_COOKIE[Constants::COOKIE_P] = 'identityHash:123';
        $_COOKIE[Constants::COOKIE_PARAMS] = '{"utm_source":"email","utm_campaign":"test"}';

        $factory = new CookieProfileFactory();
        $profile = $factory->create();

        $this->assertNotNull($profile->getExtraParams());
    }

    public function testCreateWithoutParamsCookieShouldSetNullExtraParams(): void
    {
        $_COOKIE[Constants::COOKIE_UUID] = 'test-uuid';
        $_COOKIE[Constants::COOKIE_P] = 'identityHash:123';

        $factory = new CookieProfileFactory();
        $profile = $factory->create();

        $this->assertNull($profile->getExtraParams());
    }
}
