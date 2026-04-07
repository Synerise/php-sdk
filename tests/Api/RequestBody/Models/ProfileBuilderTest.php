<?php

declare(strict_types=1);

namespace Tests\Synerise\Sdk\Api\RequestBody\Models;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Synerise\Api\V4\Models\Agreements;
use Synerise\Api\V4\Models\Profile;
use Synerise\Api\V4\Models\ProfileSex;
use Synerise\Sdk\Api\RequestBody\Models\ProfileBuilder;

class ProfileBuilderTest extends TestCase
{
    private ProfileBuilder $profileBuilder;

    protected function setUp(): void
    {
        $this->profileBuilder = ProfileBuilder::initialize();
    }

    public function testBuildWithoutIdentifierThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('You must provide at least one of profile identifier.');

        $this->profileBuilder->build();
    }

    public function testBuildWithEmail(): void
    {
        $email = 'test@example.com';
        $profile = $this->profileBuilder
            ->setEmail($email)
            ->build();

        $this->assertInstanceOf(Profile::class, $profile);
        $this->assertEquals($email, $profile->getEmail());
    }

    public function testAddAndRemoveAttribute(): void
    {
        $attributeName = 'testAttr';
        $attributeValue = 'testValue';

        $profile = $this->profileBuilder
            ->setEmail('test@example.com')
            ->addAttribute($attributeName, $attributeValue)
            ->build();

        $this->assertEquals(
            $attributeValue,
            $profile->getAttributes()->getAdditionalData()[$attributeName],
        );

        $profile = $this->profileBuilder
            ->removeAttribute($attributeName)
            ->build();

        $this->assertEmpty($profile->getAttributes()->getAdditionalData());
    }

    public function testAddAndRemoveTag(): void
    {
        $tagName = 'testTag';

        $profile = $this->profileBuilder
            ->setEmail('test@example.com')
            ->addTag($tagName)
            ->build();

        $this->assertContains($tagName, $profile->getTags());

        $profile = $this->profileBuilder
            ->removeTag($tagName)
            ->build();

        $this->assertEmpty($profile->getTags());
    }

    public function testAddTagWithNullValueThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Tag name cannot be "null"');

        $this->profileBuilder->addTag('null');
    }

    public function testSetPersonalInformation(): void
    {
        $profile = $this->profileBuilder
            ->setEmail('test@example.com')
            ->setFirstName('Jan')
            ->setLastName('Kowalski')
            ->setPhone('+48123456789')
            ->setBirthDate('1990-01-01')
            ->setSex(new ProfileSex(ProfileSex::M_A_L_E))
            ->build();

        $this->assertEquals('Jan', $profile->getFirstName());
        $this->assertEquals('Kowalski', $profile->getLastName());
        $this->assertEquals('+48123456789', $profile->getPhone());
        $this->assertEquals('1990-01-01', $profile->getBirthDate());
        $this->assertEquals(ProfileSex::M_A_L_E, $profile->getSex()->value());
    }

    public function testSetAddressInformation(): void
    {
        $profile = $this->profileBuilder
            ->setEmail('test@example.com')
            ->setAddress('ul. Testowa 1')
            ->setCity('Warszawa')
            ->setProvince('mazowieckie')
            ->setCountryCode('PL')
            ->setZipCode('00-001')
            ->build();

        $this->assertEquals('ul. Testowa 1', $profile->getAddress());
        $this->assertEquals('Warszawa', $profile->getCity());
        $this->assertEquals('mazowieckie', $profile->getProvince());
        $this->assertEquals('PL', $profile->getCountryCode());
        $this->assertEquals('00-001', $profile->getZipCode());
    }

    public function testSetAgreements(): void
    {
        $agreements = new Agreements();
        $agreements->setEmail(true);

        $profile = $this->profileBuilder
            ->setEmail('test@example.com')
            ->setAgreements($agreements)
            ->build();

        $this->assertTrue($profile->getAgreements()->getEmail());
    }

    public function testBuildWithoutValidation(): void
    {
        $profile = $this->profileBuilder
            ->setEmail('test@example.com')
            ->build(false);

        $this->assertInstanceOf(Profile::class, $profile);
    }
}
