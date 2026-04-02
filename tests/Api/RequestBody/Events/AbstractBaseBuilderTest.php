<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\RequestBody\Events;

use DateTime;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\CustomEvent;
use Synerise\Api\V4\Models\EventSource;
use Synerise\Sdk\Api\RequestBody\Events\CustomBuilder;

class AbstractBaseBuilderTest extends TestCase
{
    public function testBuildWithUuidShouldReturnEvent(): void
    {
        $builder = $this->createBuilder($this->createClientWithUuid());

        $event = $builder->build(false);

        $this->assertInstanceOf(CustomEvent::class, $event);
        $this->assertSame('test.action', $event->getAction());
        $this->assertSame('Test label', $event->getLabel());
        $this->assertNotNull($event->getTime());
        $this->assertNotNull($event->getEventSalt());
    }

    public function testBuildWithEmailShouldReturnEvent(): void
    {
        $client = new Client();
        $client->setEmail('test@example.com');
        $builder = $this->createBuilder($client);

        $event = $builder->build(false);

        $this->assertInstanceOf(CustomEvent::class, $event);
    }

    public function testBuildWithCustomIdShouldReturnEvent(): void
    {
        $client = new Client();
        $client->setCustomId('custom-123');
        $builder = $this->createBuilder($client);

        $event = $builder->build(false);

        $this->assertInstanceOf(CustomEvent::class, $event);
    }

    public function testBuildWithoutIdentifierShouldThrow(): void
    {
        $client = new Client();
        $builder = $this->createBuilder($client);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('at least one of profile identifier');

        $builder->build(false);
    }

    public function testSetEventSaltShouldUseCustomSalt(): void
    {
        $builder = $this->createBuilder($this->createClientWithUuid());
        $builder->setEventSalt('custom-salt-123');

        $event = $builder->build(false);

        $this->assertSame('custom-salt-123', $event->getEventSalt());
    }

    public function testDefaultSaltFormatShouldContainActionAndIdentifier(): void
    {
        $builder = $this->createBuilder($this->createClientWithUuid());

        $event = $builder->build(false);

        $salt = $event->getEventSalt();
        $this->assertStringContainsString('test.action', $salt);
        $this->assertStringContainsString('550e8400-e29b-41d4-a716-446655440000', $salt);
    }

    public function testSetTimeShouldUseProvidedTime(): void
    {
        $builder = $this->createBuilder($this->createClientWithUuid());
        $builder->setTime(new DateTime('2024-06-15T12:00:00+00:00'));

        $event = $builder->build(false);

        $this->assertStringContainsString('2024-06-15', $event->getTime());
    }

    public function testSetSourceShouldUseProvidedSource(): void
    {
        $builder = $this->createBuilder($this->createClientWithUuid());

        $event = $builder->build(false);

        $additionalData = $event->getParams()->getAdditionalData();
        $this->assertArrayHasKey('source', $additionalData);
        $this->assertInstanceOf(EventSource::class, $additionalData['source']);
    }

    public function testSetParamWithUnknownKeyShouldStoreInAdditionalData(): void
    {
        $builder = $this->createBuilder($this->createClientWithUuid());
        $builder->setParam('customKey', 'customValue');

        $event = $builder->build(false);

        $additionalData = $event->getParams()->getAdditionalData();
        $this->assertArrayHasKey('customKey', $additionalData);
        $this->assertSame('customValue', $additionalData['customKey']);
    }

    public function testSetParamsShouldProcessArray(): void
    {
        $builder = $this->createBuilder($this->createClientWithUuid());
        $builder->setParams(['key1' => 'value1', 'key2' => 'value2']);

        $event = $builder->build(false);

        $additionalData = $event->getParams()->getAdditionalData();
        $this->assertSame('value1', $additionalData['key1']);
        $this->assertSame('value2', $additionalData['key2']);
    }

    public function testBuildWithoutAdditionalDataShouldNotCrash(): void
    {
        $builder = $this->createBuilder($this->createClientWithUuid());

        $event = $builder->build(false);

        $this->assertInstanceOf(CustomEvent::class, $event);
    }

    public function testSetLabelShouldOverrideDefault(): void
    {
        $builder = $this->createBuilder($this->createClientWithUuid());
        $builder->setLabel('Custom label');

        $event = $builder->build(false);

        $this->assertSame('Custom label', $event->getLabel());
    }

    private function createClientWithUuid(): Client
    {
        $client = new Client();
        $client->setUuid('550e8400-e29b-41d4-a716-446655440000');
        return $client;
    }

    private function createBuilder(Client $client): CustomBuilder
    {
        $builder = CustomBuilder::initialize($client);
        $builder->setAction('test.action')
            ->setLabel('Test label')
            ->setSource(new EventSource(EventSource::W_E_B__D_E_S_K_T_O_P));

        return $builder;
    }
}
