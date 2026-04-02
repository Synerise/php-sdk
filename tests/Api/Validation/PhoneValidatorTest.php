<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\Validation;

use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Api\Validation\PhoneValidator;

class PhoneValidatorTest extends TestCase
{
    private static array $validPhoneList = [
        '+48 123 456 789',           // Standard international format with spaces
        '+1-234-567-8901',           // US format with country code and hyphens
        '+44(0)1234567890',          // UK format with parentheses
        '123456789',                 // Simple numeric format
        '123-456-789',               // Local format with hyphens
        '(12) 3456789',              // Local format with parentheses
        '+48/123/456/789',           // Format with slashes
        '+48 (123) 456-789',         // Mixed format with spaces, parentheses and hyphen
        '123 456 789',               // Local format with spaces
        '+1 (555) 123-4567',         // North American format
    ];

    private static array $invalidPhoneList = [
        '+48',                       // Too short (less than 6 characters)
        '12345',                     // Too short (less than 6 characters)
        '+48 123 456 789 012 345',   // Too long (more than 19 characters after +)
        '1234567890123456789012',    // Too long (more than 20 characters)
        'abcd123456',                // Contains letters
        '+abc1234567',               // Contains letters after +
        '12.34.56.78',               // Contains dots
        '+48_123_456_789',           // Contains underscore
        '@#$%^&',                    // Special characters
        '',                          // Empty string
        '++48123456789',             // Double plus
        '+',                         // Only plus sign
        '()-',                       // Only special characters
        '+48 123 456 789@',          // Contains @ symbol
    ];

    public function testValidPhone()
    {
        foreach (self::$validPhoneList as $validPhone) {
            $this->assertEmpty(PhoneValidator::validate($validPhone), sprintf('Phone number should be valid: %s', $validPhone));
        }
    }

    public function testInvalidPhone()
    {
        foreach (self::$invalidPhoneList as $invalidPhone) {
            $this->assertNotEmpty(PhoneValidator::validate($invalidPhone), sprintf('Phone number should be invalid: %s', $invalidPhone));
        }
    }

}
