<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\Validation;

use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Api\Validation\EmailValidator;

class EmailValidatorTest extends TestCase
{
    private static array $validEmailList = [
        'developer@synerise.com',         // Standard email with common TLD (.com)
        'developer@synerise.pl',          // Valid email with country-specific TLD (.pl)
        'developer@[255.255.255.255]',    // Valid email with maximum IP address values
        'developer@[127.0.0.1]',          // Valid email with localhost IP address
        'john.doe@synerise.com',          // Valid email with dot in local part
    ];

    private static array $invalidEmailList = [
        'test@',                          // Missing domain
        '@example.com',                   // Missing local part
        'test.@example.com',              // Dot at the end of local part
        '.test@example.com',              // Dot at the beginning of local part
        'te st@example.com',              // Space in local part
        'test@exa mple.com',              // Space in domain
        'test@-example.com',              // Hyphen at the beginning of domain
        'test@example-.com',              // Hyphen at the end of domain
        'test@.example.com',              // Dot at the beginning of domain
        'test@example..com',              // Double dots in domain
        'test..name@example.com',         // Double dots in local part
        'test@example.c',                 // TLD too short (minimum 2 characters)
        'test@@example.com',              // Double @ character
        'test@example@com',               // Multiple @ characters
        'test:name@example.com',          // Invalid character (colon)
        'test,name@example.com',          // Invalid character (comma)
        'test<>@example.com',             // Invalid characters (angle brackets)
        'test[]@example.com',             // Invalid characters (square brackets) in local part
        'test@[300.300.300.300]',         // Invalid IP address (values > 255)
        'test@[123.123.123]',             // Incomplete IP address
        'test@ąęść.com'                   // Diacritical marks in domain
    ];

    public function testValidEmail()
    {
        foreach (self::$validEmailList as $validEmail) {
            $this->assertEmpty(EmailValidator::validate($validEmail), $validEmail);
        }
    }

    public function testInvalidEmail()
    {
        foreach (self::$invalidEmailList as $invalidEmail) {
            $this->assertNotEmpty(EmailValidator::validate($invalidEmail), $invalidEmail);
        }
    }

}
