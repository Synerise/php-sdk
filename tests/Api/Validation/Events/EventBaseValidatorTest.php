<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\Validation\Events;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\HitTimerEvent;
use Synerise\Sdk\Api\Validation\Events\EventBaseValidator;

class EventBaseValidatorTest extends TestCase
{
    public function testValidEventShouldPassValidation(): void
    {
        $event = $this->createValidEvent();

        $errors = EventBaseValidator::validate($event, false);

        $this->assertEmpty($errors);
    }

    public function testMissingClientShouldReturnError(): void
    {
        $event = new HitTimerEvent();
        $event->setLabel('test.label');
        $event->setTime('2024-01-01T00:00:00Z');

        $errors = EventBaseValidator::validate($event, false);

        $this->assertNotEmpty($errors);
        $this->assertContains('Client is required', $errors);
    }

    public function testMissingLabelShouldReturnError(): void
    {
        $event = new HitTimerEvent();
        $client = new Client();
        $client->setUuid('550e8400-e29b-41d4-a716-446655440000');
        $event->setClient($client);
        $event->setTime('2024-01-01T00:00:00Z');

        $errors = EventBaseValidator::validate($event, false);

        $this->assertNotEmpty($errors);
        $this->assertContains('Label is required', $errors);
    }

    public function testInvalidTimeShouldReturnError(): void
    {
        $event = new HitTimerEvent();
        $client = new Client();
        $client->setUuid('550e8400-e29b-41d4-a716-446655440000');
        $event->setClient($client);
        $event->setLabel('test.label');
        $event->setTime('not-a-date');

        $errors = EventBaseValidator::validate($event, false);

        $this->assertNotEmpty($errors);
        $this->assertContains('Time is not a valid ISO8601 format', $errors);
    }

    public function testInvalidClientUuidShouldReturnError(): void
    {
        $event = new HitTimerEvent();
        $client = new Client();
        $client->setUuid('invalid-uuid');
        $event->setClient($client);
        $event->setLabel('test.label');
        $event->setTime('2024-01-01T00:00:00Z');

        $errors = EventBaseValidator::validate($event, false);

        $this->assertNotEmpty($errors);
        $this->assertStringContainsString('UUID format invalid', $errors[0]);
    }

    public function testThrowOnErrorShouldThrowException(): void
    {
        $event = new HitTimerEvent();
        $event->setTime('2024-01-01T00:00:00Z');

        $this->expectException(InvalidArgumentException::class);

        EventBaseValidator::validate($event, true);
    }

    public function testISO8601WithValidFormats(): void
    {
        $this->assertTrue(EventBaseValidator::ISO8601('2024-01-01T00:00:00Z'));
        $this->assertTrue(EventBaseValidator::ISO8601('2024-01-01T12:30:45+02:00'));
        $this->assertTrue(EventBaseValidator::ISO8601('2024-01-01T12:30:45-05:00'));
        $this->assertTrue(EventBaseValidator::ISO8601('2024-01-01T12:30:45.123Z'));
    }

    public function testISO8601WithInvalidFormats(): void
    {
        $this->assertFalse(EventBaseValidator::ISO8601('not-a-date'));
        $this->assertFalse(EventBaseValidator::ISO8601('2024-13-01'));
        $this->assertFalse(EventBaseValidator::ISO8601(''));
    }

    private function createValidEvent(): HitTimerEvent
    {
        $event = new HitTimerEvent();
        $client = new Client();
        $client->setUuid('550e8400-e29b-41d4-a716-446655440000');
        $event->setClient($client);
        $event->setLabel('test.label');
        $event->setTime('2024-01-01T00:00:00Z');

        return $event;
    }
}
