<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\Validation;

use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Api\Validation\BirthDateValidator;

class BirthDateValidatorTest extends TestCase
{
    public function testValidBirthDate()
    {
        $this->assertEmpty(BirthDateValidator::validate('2025-06-01'));
    }

    public function testInvalidBirthDate()
    {
        $this->assertNotEmpty(BirthDateValidator::validate('1899-01-01'));
        $this->assertNotEmpty(BirthDateValidator::validate('2100-01-01'));
        $this->assertNotEmpty(BirthDateValidator::validate('01-06-2025'));
    }
}
