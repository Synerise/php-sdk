<?php

namespace Synerise\Tests\Api\Validation;

use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Api\Validation\TimeValidator;

class TimeValidatorTest extends TestCase
{
    private static array $validTimeList = [
        // with Z
        '2025-07-10T14:23:00Z',
        '2025-07-10T14:23:00.123Z',
        '2025-07-10T14:23:00.123456Z',
        // different timezone
        '2025-07-10T14:23:00+00:00',
        '2025-07-10T14:23:00.123+02:00',
        '2025-07-10T14:23:00-05:00',
        '2025-07-10T14:23:00.999999-03:30',
        // with ms
        '2025-07-10T14:23:00.1Z',
        '2025-07-10T14:23:00.123Z',
        '2025-07-10T14:23:00.1234+01:00',
        '2025-07-10T14:23:00.123456-10:00',
    ];

    private static array $invalidTimeList = [
        '2025-07-10 14:23:00',         // without "T"
        '2025-07-10T14:23',            // without s
        '2025-07-10T14:23:00+0000',    // without ":"
        '2025/07/10T14:23:00Z ',       // wrong time separator
        '2025-07-10T14:23:00.',        // dot without ms value
    ];

    public function testValidTime()
    {
        foreach (self::$validTimeList as $validTime) {
            $this->assertEmpty(TimeValidator::validate($validTime), sprintf('Time format should be valid: %s', $validTime));
        }
    }

    public function testInvalidTime()
    {
        foreach (self::$invalidTimeList as $invalidTime) {
            $this->assertNotEmpty(TimeValidator::validate($invalidTime), sprintf('Time format should be invalid: %s', $invalidTime));
        }
    }

    public function testEmpty()
    {
        $this->assertEmpty(TimeValidator::validate(null));
    }
}
