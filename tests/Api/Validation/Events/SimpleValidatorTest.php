<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\Validation\Events;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Synerise\Api\V4\Models\AddedToFavoritesEvent;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\CustomEvent;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\HitTimerEvent;
use Synerise\Sdk\Api\Validation\Events\AddedReviewValidator;
use Synerise\Sdk\Api\Validation\Events\AddedToFavoritesValidator;
use Synerise\Sdk\Api\Validation\Events\CustomValidator;
use Synerise\Sdk\Api\Validation\Events\DeletedValidator;
use Synerise\Sdk\Api\Validation\Events\HitTimerValidator;
use Synerise\Sdk\Api\Validation\Events\RemovedFromFavoritesValidator;

class SimpleValidatorTest extends TestCase
{
    // --- CustomValidator ---

    public function testCustomValidShouldPass(): void
    {
        $event = $this->createCustomEvent('custom.action');

        $errors = CustomValidator::validate($event, false);

        $this->assertEmpty($errors);
    }

    public function testCustomMissingActionShouldReturnError(): void
    {
        $event = $this->createBaseEvent(CustomEvent::class);
        $params = new DefaultParamSource();
        $params->setAdditionalData([]);
        $event->setParams($params);

        $errors = CustomValidator::validate($event, false);

        $this->assertContains('Action is required', $errors);
    }

    public function testCustomMissingParamsShouldReturnError(): void
    {
        $event = $this->createBaseEvent(CustomEvent::class);
        $event->setAction('custom.action');

        $errors = CustomValidator::validate($event, false);

        $this->assertContains('Params are required', $errors);
    }

    public function testCustomThrowOnErrorShouldThrow(): void
    {
        $event = $this->createBaseEvent(CustomEvent::class);

        $this->expectException(InvalidArgumentException::class);

        CustomValidator::validate($event, true);
    }

    // --- DeletedValidator ---

    public function testDeletedValidShouldPass(): void
    {
        $event = $this->createCustomEvent('client.deleteAccount');

        $errors = DeletedValidator::validate($event, false);

        $this->assertEmpty($errors);
    }

    public function testDeletedMissingActionShouldReturnError(): void
    {
        $event = $this->createBaseEvent(CustomEvent::class);
        $params = new DefaultParamSource();
        $params->setAdditionalData([]);
        $event->setParams($params);

        $errors = DeletedValidator::validate($event, false);

        $this->assertContains('Action is required', $errors);
    }

    public function testDeletedMissingParamsShouldReturnError(): void
    {
        $event = $this->createBaseEvent(CustomEvent::class);
        $event->setAction('client.deleteAccount');

        $errors = DeletedValidator::validate($event, false);

        $this->assertContains('Params are required', $errors);
    }

    // --- AddedReviewValidator ---

    public function testAddedReviewValidShouldPass(): void
    {
        $event = $this->createCustomEvent('product.addReview');

        $errors = AddedReviewValidator::validate($event, false);

        $this->assertEmpty($errors);
    }

    public function testAddedReviewMissingActionAndParamsShouldReturnErrors(): void
    {
        $event = $this->createBaseEvent(CustomEvent::class);

        $errors = AddedReviewValidator::validate($event, false);

        $this->assertContains('Params are required', $errors);
        $this->assertContains('Action is required', $errors);
    }

    public function testAddedReviewThrowOnErrorShouldThrow(): void
    {
        $event = $this->createBaseEvent(CustomEvent::class);

        $this->expectException(InvalidArgumentException::class);

        AddedReviewValidator::validate($event, true);
    }

    // --- RemovedFromFavoritesValidator ---

    public function testRemovedFromFavoritesValidShouldPass(): void
    {
        $event = $this->createCustomEvent('product.removeFromFavorites');

        $errors = RemovedFromFavoritesValidator::validate($event, false);

        $this->assertEmpty($errors);
    }

    public function testRemovedFromFavoritesMissingActionShouldReturnError(): void
    {
        $event = $this->createBaseEvent(CustomEvent::class);
        $params = new DefaultParamSource();
        $params->setAdditionalData([]);
        $event->setParams($params);

        $errors = RemovedFromFavoritesValidator::validate($event, false);

        $this->assertContains('Action is required', $errors);
    }

    // --- AddedToFavoritesValidator ---

    public function testAddedToFavoritesValidShouldPass(): void
    {
        $event = $this->createBaseEvent(AddedToFavoritesEvent::class);
        $params = new DefaultParamSource();
        $params->setAdditionalData([]);
        $event->setParams($params);

        $errors = AddedToFavoritesValidator::validate($event, false);

        $this->assertEmpty($errors);
    }

    public function testAddedToFavoritesMissingParamsShouldReturnError(): void
    {
        $event = $this->createBaseEvent(AddedToFavoritesEvent::class);

        $errors = AddedToFavoritesValidator::validate($event, false);

        $this->assertContains('Params are required', $errors);
    }

    public function testAddedToFavoritesThrowOnErrorShouldThrow(): void
    {
        $event = $this->createBaseEvent(AddedToFavoritesEvent::class);

        $this->expectException(InvalidArgumentException::class);

        AddedToFavoritesValidator::validate($event, true);
    }

    // --- HitTimerValidator ---

    public function testHitTimerValidShouldPass(): void
    {
        $event = $this->createBaseEvent(HitTimerEvent::class);

        $errors = HitTimerValidator::validate($event, false);

        $this->assertEmpty($errors);
    }

    public function testHitTimerInheritsBaseValidation(): void
    {
        $event = new HitTimerEvent();
        $event->setTime('2024-01-01T00:00:00Z');

        $errors = HitTimerValidator::validate($event, false);

        $this->assertContains('Client is required', $errors);
    }

    public function testHitTimerThrowOnErrorShouldThrow(): void
    {
        $event = new HitTimerEvent();
        $event->setTime('2024-01-01T00:00:00Z');

        $this->expectException(InvalidArgumentException::class);

        HitTimerValidator::validate($event, true);
    }

    // --- Helpers ---

    private function createBaseEvent(string $eventClass)
    {
        $event = new $eventClass();
        $client = new Client();
        $client->setUuid('550e8400-e29b-41d4-a716-446655440000');
        $event->setClient($client);
        $event->setLabel('test.label');
        $event->setTime('2024-01-01T00:00:00Z');

        return $event;
    }

    private function createCustomEvent(string $action): CustomEvent
    {
        $event = $this->createBaseEvent(CustomEvent::class);
        $event->setAction($action);
        $params = new DefaultParamSource();
        $params->setAdditionalData([]);
        $event->setParams($params);

        return $event;
    }
}
