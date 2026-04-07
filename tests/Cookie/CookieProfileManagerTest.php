<?php

declare(strict_types=1);

namespace Synerise\Tests\Cookie;

use Exception;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Synerise\Sdk\Cookie\Constants;
use Synerise\Sdk\Cookie\CookieAdapter;
use Synerise\Sdk\Cookie\CookieProfileFactory;
use Synerise\Sdk\Cookie\CookieProfileManager;
use Synerise\Sdk\Exception\NotFoundException;
use Synerise\Sdk\Model\Profile;
use Synerise\Sdk\Model\Profile\BaseParams;

class CookieProfileManagerTest extends TestCase
{
    public function testGetProfileShouldReturnProfileFromFactory(): void
    {
        $profile = new Profile();
        $profile->setUuid('test-uuid');

        $factory = $this->createMock(CookieProfileFactory::class);
        $factory->method('create')->willReturn($profile);

        $adapter = $this->createMock(CookieAdapter::class);

        $manager = new CookieProfileManager($adapter, $factory);

        $this->assertSame($profile, $manager->getProfile());
    }

    public function testGetProfileShouldCacheResult(): void
    {
        $profile = new Profile();
        $profile->setUuid('test-uuid');

        $factory = $this->createMock(CookieProfileFactory::class);
        $factory->expects($this->once())->method('create')->willReturn($profile);

        $adapter = $this->createMock(CookieAdapter::class);

        $manager = new CookieProfileManager($adapter, $factory);

        $manager->getProfile();
        $manager->getProfile(); // Should use cached value
    }

    public function testGetProfileShouldRethrowNotFoundException(): void
    {
        $factory = $this->createMock(CookieProfileFactory::class);
        $factory->method('create')->willThrowException(new NotFoundException('No cookies'));

        $adapter = $this->createMock(CookieAdapter::class);

        $manager = new CookieProfileManager($adapter, $factory);

        $this->expectException(NotFoundException::class);

        $manager->getProfile();
    }

    public function testGetProfileShouldWrapOtherExceptionsInRuntimeException(): void
    {
        $factory = $this->createMock(CookieProfileFactory::class);
        $factory->method('create')->willThrowException(new Exception('Parse error'));

        $adapter = $this->createMock(CookieAdapter::class);

        $manager = new CookieProfileManager($adapter, $factory);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('problem getting Profile');

        $manager->getProfile();
    }

    public function testResetProfileShouldUpdateUuidAndSetCookie(): void
    {
        $baseParams = new BaseParams();
        $baseParams->setIdentityHash(null);

        $profile = new Profile();
        $profile->setUuid('old-uuid');
        $profile->setBaseParams($baseParams);

        $factory = $this->createMock(CookieProfileFactory::class);
        $factory->method('create')->willReturn($profile);

        $adapter = $this->createMock(CookieAdapter::class);
        $adapter->expects($this->once())
            ->method('setValue')
            ->with(Constants::COOKIE_RESET_UUID, 'new-uuid');

        $manager = new CookieProfileManager($adapter, $factory);
        $manager->resetProfile('new-uuid');

        $this->assertSame('new-uuid', $manager->getProfile()->getUuid());
    }

    public function testResetProfileWithEmailHashShouldUpdateIdentityHash(): void
    {
        $baseParams = new BaseParams();
        $baseParams->setIdentityHash(null);

        $profile = new Profile();
        $profile->setUuid('old-uuid');
        $profile->setBaseParams($baseParams);

        $factory = $this->createMock(CookieProfileFactory::class);
        $factory->method('create')->willReturn($profile);

        $adapter = $this->createMock(CookieAdapter::class);

        $manager = new CookieProfileManager($adapter, $factory);
        $manager->resetProfile('new-uuid', 'email-hash');

        $this->assertSame('email-hash', $manager->getProfile()->getBaseParams()->getIdentityHash());
    }

    public function testResetProfileWithEmptyUuidShouldThrow(): void
    {
        $profile = new Profile();
        $profile->setUuid('uuid');

        $factory = $this->createMock(CookieProfileFactory::class);
        $factory->method('create')->willReturn($profile);

        $adapter = $this->createMock(CookieAdapter::class);

        $manager = new CookieProfileManager($adapter, $factory);

        $this->expectException(InvalidArgumentException::class);

        $manager->resetProfile('');
    }
}
