<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\Validation\Events;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\EventBase;
use Synerise\Api\V4\Models\EventSource;
use Synerise\Api\V4\Models\LoggedInEvent;
use Synerise\Api\V4\Models\LoggedOutEvent;
use Synerise\Api\V4\Models\ProductViewEvent;
use Synerise\Api\V4\Models\ProductViewEventParams;
use Synerise\Api\V4\Models\PushCancelledEvent;
use Synerise\Api\V4\Models\PushClickedEvent;
use Synerise\Api\V4\Models\PushReceivedEvent;
use Synerise\Api\V4\Models\PushViewedEvent;
use Synerise\Api\V4\Models\RegisteredEvent;
use Synerise\Api\V4\Models\SearchedEvent;
use Synerise\Api\V4\Models\SharedEvent;
use Synerise\Api\V4\Models\VisitedScreenEvent;
use Synerise\Sdk\Api\Validation\Events\LoggedInValidator;
use Synerise\Sdk\Api\Validation\Events\LoggedOutValidator;
use Synerise\Sdk\Api\Validation\Events\ProductViewValidator;
use Synerise\Sdk\Api\Validation\Events\Push\CancelledValidator;
use Synerise\Sdk\Api\Validation\Events\Push\ClickedValidator;
use Synerise\Sdk\Api\Validation\Events\Push\ReceivedValidator;
use Synerise\Sdk\Api\Validation\Events\Push\ViewedValidator;
use Synerise\Sdk\Api\Validation\Events\RegisteredValidator;
use Synerise\Sdk\Api\Validation\Events\SearchedValidator;
use Synerise\Sdk\Api\Validation\Events\SharedValidator;
use Synerise\Sdk\Api\Validation\Events\VisitedScreenValidator;

class SourceValidatorTest extends TestCase
{
    /**
     * @dataProvider defaultParamSourceValidatorsProvider
     */
    public function testValidEventWithSourceShouldPassValidation(string $validatorClass, string $eventClass): void
    {
        $event = $this->createValidEventWithSource($eventClass);

        $errors = $validatorClass::validate($event, false);

        $this->assertEmpty($errors);
    }

    /**
     * @dataProvider defaultParamSourceValidatorsProvider
     */
    public function testMissingParamsShouldReturnError(string $validatorClass, string $eventClass): void
    {
        $event = $this->createBaseEvent($eventClass);

        $errors = $validatorClass::validate($event, false);

        $this->assertContains('Params are required', $errors);
    }

    /**
     * @dataProvider defaultParamSourceValidatorsProvider
     */
    public function testMissingSourceShouldReturnError(string $validatorClass, string $eventClass): void
    {
        $event = $this->createBaseEvent($eventClass);
        $params = new DefaultParamSource();
        $params->setAdditionalData([]);
        $event->setParams($params);

        $errors = $validatorClass::validate($event, false);

        $this->assertContains('Event source is required', $errors);
    }

    /**
     * @dataProvider defaultParamSourceValidatorsProvider
     */
    public function testThrowOnErrorShouldThrowException(string $validatorClass, string $eventClass): void
    {
        $event = $this->createBaseEvent($eventClass);

        $this->expectException(InvalidArgumentException::class);

        $validatorClass::validate($event, true);
    }

    public function testProductViewWithSourceInAdditionalDataShouldPass(): void
    {
        $event = $this->createBaseEvent(ProductViewEvent::class);
        $params = new ProductViewEventParams();
        $params->setAdditionalData([
            'source' => new EventSource(EventSource::W_E_B__D_E_S_K_T_O_P),
        ]);
        $event->setParams($params);

        $errors = ProductViewValidator::validate($event, false);

        $this->assertEmpty($errors);
    }

    public static function defaultParamSourceValidatorsProvider(): array
    {
        return [
            'SearchedValidator' => [SearchedValidator::class, SearchedEvent::class],
            'RegisteredValidator' => [RegisteredValidator::class, RegisteredEvent::class],
            'LoggedInValidator' => [LoggedInValidator::class, LoggedInEvent::class],
            'LoggedOutValidator' => [LoggedOutValidator::class, LoggedOutEvent::class],
            'SharedValidator' => [SharedValidator::class, SharedEvent::class],
            'VisitedScreenValidator' => [VisitedScreenValidator::class, VisitedScreenEvent::class],
            'PushCancelledValidator' => [CancelledValidator::class, PushCancelledEvent::class],
            'PushClickedValidator' => [ClickedValidator::class, PushClickedEvent::class],
            'PushReceivedValidator' => [ReceivedValidator::class, PushReceivedEvent::class],
            'PushViewedValidator' => [ViewedValidator::class, PushViewedEvent::class],
        ];
    }

    private function createBaseEvent(string $eventClass): EventBase
    {
        $event = new $eventClass();
        $client = new Client();
        $client->setUuid('550e8400-e29b-41d4-a716-446655440000');
        $event->setClient($client);
        $event->setLabel('test.label');
        $event->setTime('2024-01-01T00:00:00Z');

        return $event;
    }

    private function createValidEventWithSource(string $eventClass): EventBase
    {
        $event = $this->createBaseEvent($eventClass);
        $params = new DefaultParamSource();
        $params->setAdditionalData([
            'source' => new EventSource(EventSource::W_E_B__D_E_S_K_T_O_P),
        ]);
        $event->setParams($params);

        return $event;
    }
}
