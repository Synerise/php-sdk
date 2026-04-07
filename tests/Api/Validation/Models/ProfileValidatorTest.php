<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\Validation\Models;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Synerise\Api\V4\Models\Attributes;
use Synerise\Api\V4\Models\Profile;
use Synerise\Sdk\Api\Validation\Models\ProfileValidator;

class ProfileValidatorTest extends TestCase
{
    public function testValidProfileShouldPassValidation(): void
    {
        // Arrange
        $profile = new Profile();
        $attributes = new Attributes();
        $attributes->setAdditionalData([
            'custom_field' => 'value',
            'another_field' => 123,
        ]);

        $profile->setAttributes($attributes);
        $profile->setEmail('test@example.com');
        $profile->setBirthDate('2000-01-01');
        $profile->setPhone('+48123456789');

        // Act
        $errors = ProfileValidator::validate($profile, false);

        // Assert
        $this->assertEmpty($errors);
    }

    public function testProfileWithReservedAttributesShouldReturnErrors(): void
    {
        // Arrange
        $profile = new Profile();
        $attributes = new Attributes();
        $attributes->setAdditionalData([
            'email' => 'test@example.com',
            'phone' => '+48123456789',
        ]);

        $profile->setAttributes($attributes);

        // Act
        $errors = ProfileValidator::validate($profile, false);

        // Assert
        $this->assertCount(2, $errors);
        $this->assertStringContainsString('email', $errors[0]);
        $this->assertStringContainsString('phone', $errors[1]);
    }

    public function testProfileWithInvalidEmailShouldReturnErrors(): void
    {
        // Arrange
        $profile = new Profile();
        $profile->setEmail('invalid-email');

        // Act
        $errors = ProfileValidator::validate($profile, false);

        // Assert
        $this->assertNotEmpty($errors);
        $this->assertStringContainsString('email', implode(', ', $errors));
    }

    public function testProfileWithInvalidBirthDateShouldReturnErrors(): void
    {
        // Arrange
        $profile = new Profile();
        $profile->setBirthDate('1899-01-01');

        // Act
        $errors = ProfileValidator::validate($profile, false);

        // Assert
        $this->assertNotEmpty($errors);
        $this->assertStringContainsString('birth', implode(', ', $errors));
    }

    public function testProfileWithInvalidPhoneShouldReturnErrors(): void
    {
        // Arrange
        $profile = new Profile();
        $profile->setPhone('123');

        // Act
        $errors = ProfileValidator::validate($profile, false);

        // Assert
        $this->assertNotEmpty($errors);
        $this->assertStringContainsString('phone', implode(', ', $errors));
    }

    public function testValidationShouldThrowExceptionWhenEnabled(): void
    {
        // Arrange
        $profile = new Profile();
        $attributes = new Attributes();
        $attributes->setAdditionalData(['email' => 'test@example.com']);
        $profile->setAttributes($attributes);

        // Assert
        $this->expectException(InvalidArgumentException::class);

        // Act
        ProfileValidator::validate($profile, true);
    }

    public function testNullAttributesShouldPassValidation(): void
    {
        // Arrange
        $profile = new Profile();
        $attributes = new Attributes();
        $attributes->setAdditionalData(null);
        $profile->setAttributes($attributes);

        // Act
        $errors = ProfileValidator::validate($profile, false);

        // Assert
        $this->assertEmpty($errors);
    }
}
