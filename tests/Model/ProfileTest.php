<?php

declare(strict_types=1);

namespace Synerise\Tests\Model;

use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Model\Profile;
use Synerise\Sdk\Model\Profile\BaseParams;

class ProfileTest extends TestCase
{
    public function testSetAndGetUuid(): void
    {
        $profile = new Profile();
        $profile->setUuid('550e8400-e29b-41d4-a716-446655440000');

        $this->assertSame('550e8400-e29b-41d4-a716-446655440000', $profile->getUuid());
    }

    public function testSetAndGetBaseParams(): void
    {
        $profile = new Profile();
        $baseParams = new BaseParams();
        $profile->setBaseParams($baseParams);

        $this->assertSame($baseParams, $profile->getBaseParams());
    }

    public function testSetAndGetExtraParams(): void
    {
        $profile = new Profile();
        $profile->setExtraParams(['key' => 'value']);

        $this->assertSame(['key' => 'value'], $profile->getExtraParams());
    }

    public function testGetExtraParamShouldReturnValueByName(): void
    {
        $profile = new Profile();
        $profile->setExtraParams(['color' => 'blue', 'size' => 'large']);

        $this->assertSame('blue', $profile->getExtraParam('color'));
        $this->assertSame('large', $profile->getExtraParam('size'));
    }

    public function testGetExtraParamShouldReturnNullForMissingKey(): void
    {
        $profile = new Profile();
        $profile->setExtraParams(['key' => 'value']);

        $this->assertNull($profile->getExtraParam('missing'));
    }

    public function testGetExtraParamWhenExtraParamsIsNullShouldReturnNull(): void
    {
        $profile = new Profile();
        $profile->setExtraParams(null);

        $this->assertNull($profile->getExtraParam('anything'));
    }

    public function testSetNullValuesShouldWork(): void
    {
        $profile = new Profile();
        $profile->setUuid(null);
        $profile->setBaseParams(null);
        $profile->setExtraParams(null);

        $this->assertNull($profile->getUuid());
        $this->assertNull($profile->getBaseParams());
        $this->assertNull($profile->getExtraParams());
    }

    public function testCreateFromDiscriminatorValueShouldReturnProfile(): void
    {
        $parseNode = $this->createMock(\Microsoft\Kiota\Abstractions\Serialization\ParseNode::class);

        $profile = Profile::createFromDiscriminatorValue($parseNode);

        $this->assertInstanceOf(Profile::class, $profile);
    }
}
