<?php

declare(strict_types=1);

namespace Synerise\Tests\Tracking;

use PHPUnit\Framework\TestCase;
use Synerise\Api\V4\Models\Client;
use Synerise\Sdk\Helper\UuidGenerator;
use Synerise\Sdk\Model\Profile;
use Synerise\Sdk\Model\Profile\BaseParams;
use Synerise\Sdk\Tracking\IdentityManager;
use Synerise\Sdk\Tracking\ProfileManager;
use Synerise\Sdk\Tracking\ProfileMergeAction;

class IdentityManagerTest extends TestCase
{
    public function testGetClientShouldReturnClientWithUuid(): void
    {
        $profile = new Profile();
        $profile->setUuid('test-uuid');

        $profileManager = $this->createMock(ProfileManager::class);
        $profileManager->method('getProfile')->willReturn($profile);

        $uuidGenerator = $this->createMock(UuidGenerator::class);

        $manager = new IdentityManager($profileManager, $uuidGenerator);
        $client = $manager->getClient();

        $this->assertInstanceOf(Client::class, $client);
        $this->assertSame('test-uuid', $client->getUuid());
    }

    public function testGetProfileShouldReturnProfile(): void
    {
        $profile = new Profile();
        $profile->setUuid('test-uuid');

        $profileManager = $this->createMock(ProfileManager::class);
        $profileManager->method('getProfile')->willReturn($profile);

        $uuidGenerator = $this->createMock(UuidGenerator::class);

        $manager = new IdentityManager($profileManager, $uuidGenerator);

        $this->assertSame($profile, $manager->getProfile());
    }

    public function testIdentifyShouldResetProfileWhenUuidChanges(): void
    {
        $profile = new Profile();
        $profile->setUuid('old-uuid');

        $profileManager = $this->createMock(ProfileManager::class);
        $profileManager->method('getProfile')->willReturn($profile);
        $profileManager->expects($this->once())
            ->method('resetProfile')
            ->with('new-uuid');

        $uuidGenerator = $this->createMock(UuidGenerator::class);
        $uuidGenerator->method('uuid5')->with('test@example.com')->willReturn('new-uuid');

        $manager = new IdentityManager($profileManager, $uuidGenerator);
        $manager->identify('test@example.com');
    }

    public function testIdentifyShouldNotResetProfileWhenUuidSame(): void
    {
        $profile = new Profile();
        $profile->setUuid('same-uuid');

        $profileManager = $this->createMock(ProfileManager::class);
        $profileManager->method('getProfile')->willReturn($profile);
        $profileManager->expects($this->never())->method('resetProfile');

        $uuidGenerator = $this->createMock(UuidGenerator::class);
        $uuidGenerator->method('uuid5')->willReturn('same-uuid');

        $manager = new IdentityManager($profileManager, $uuidGenerator);
        $manager->identify('test@example.com');
    }

    public function testIdentifyShouldMergeWhenRequiredAndActionProvided(): void
    {
        $baseParams = new BaseParams();
        $baseParams->setIdentityHash(null);

        $profile = new Profile();
        $profile->setUuid('old-uuid');
        $profile->setBaseParams($baseParams);

        $profileManager = $this->createMock(ProfileManager::class);
        $profileManager->method('getProfile')->willReturn($profile);

        $uuidGenerator = $this->createMock(UuidGenerator::class);
        $uuidGenerator->method('uuid5')->willReturn('new-uuid');

        $mergeAction = $this->createMock(ProfileMergeAction::class);
        $mergeAction->expects($this->once())
            ->method('execute')
            ->with('test@example.com', 'new-uuid', 'old-uuid');

        $manager = new IdentityManager($profileManager, $uuidGenerator, $mergeAction);
        $manager->identify('test@example.com');
    }

    public function testIdentifyShouldMergeWhenBaseParamsIsNull(): void
    {
        $profile = new Profile();
        $profile->setUuid('old-uuid');
        $profile->setBaseParams(null);

        $profileManager = $this->createMock(ProfileManager::class);
        $profileManager->method('getProfile')->willReturn($profile);

        $uuidGenerator = $this->createMock(UuidGenerator::class);
        $uuidGenerator->method('uuid5')->willReturn('new-uuid');

        $mergeAction = $this->createMock(ProfileMergeAction::class);
        $mergeAction->expects($this->once())->method('execute');

        $manager = new IdentityManager($profileManager, $uuidGenerator, $mergeAction);
        $manager->identify('test@example.com');
    }

    public function testIdentifyShouldNotMergeWhenNoActionProvided(): void
    {
        $profile = new Profile();
        $profile->setUuid('old-uuid');

        $profileManager = $this->createMock(ProfileManager::class);
        $profileManager->method('getProfile')->willReturn($profile);

        $uuidGenerator = $this->createMock(UuidGenerator::class);
        $uuidGenerator->method('uuid5')->willReturn('new-uuid');

        // No merge action provided - should just reset without merging
        $manager = new IdentityManager($profileManager, $uuidGenerator);
        $manager->identify('test@example.com');

        // If we get here without exception, merge was skipped
        $this->assertTrue(true);
    }
}
