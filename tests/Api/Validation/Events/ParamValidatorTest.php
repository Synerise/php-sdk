<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\Validation\Events;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Synerise\Api\V4\Models\AppearedInLocationEvent;
use Synerise\Api\V4\Models\AppearedInLocationEventParams;
use Synerise\Api\V4\Models\ApplicationStartedEvent;
use Synerise\Api\V4\Models\ApplicationStartedEventParams;
use Synerise\Api\V4\Models\CancelledTransactionEvent;
use Synerise\Api\V4\Models\CancelledTransactionEventParams;
use Synerise\Api\V4\Models\CartEvent;
use Synerise\Api\V4\Models\CartEventParams;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\CustomEvent;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\EventSource;
use Synerise\Api\V4\Models\FinalUnitPrice;
use Synerise\Api\V4\Models\ItemSearchClickEventData;
use Synerise\Api\V4\Models\ItemSearchClickEventDataParams;
use Synerise\Api\V4\Models\Product;
use Synerise\Api\V4\Models\SearchType;
use Synerise\Sdk\Api\Validation\Events\AppearedInLocationValidator;
use Synerise\Sdk\Api\Validation\Events\ApplicationStartedValidator;
use Synerise\Sdk\Api\Validation\Events\AssignedToCompanyValidator;
use Synerise\Sdk\Api\Validation\Events\CancelledTransactionValidator;
use Synerise\Sdk\Api\Validation\Events\CartEventValidator;
use Synerise\Sdk\Api\Validation\Events\CartStatusValidator;
use Synerise\Sdk\Api\Validation\Events\ItemSearchClickValidator;

class ParamValidatorTest extends TestCase
{
    // --- CartEventValidator ---

    public function testCartEventValidShouldPass(): void
    {
        $event = $this->createBaseCartEvent();

        $errors = CartEventValidator::validate($event, false);

        $this->assertEmpty($errors);
    }

    public function testCartEventMissingParamsShouldReturnError(): void
    {
        $event = $this->createBaseEvent(CartEvent::class);

        $errors = CartEventValidator::validate($event, false);

        $this->assertContains('Params are required', $errors);
    }

    public function testCartEventMissingRequiredFieldsShouldReturnErrors(): void
    {
        $event = $this->createBaseEvent(CartEvent::class);
        $params = new CartEventParams();
        $event->setParams($params);

        $errors = CartEventValidator::validate($event, false);

        $this->assertContains('Event source is required', $errors);
        $this->assertContains('Sku is required', $errors);
        $this->assertContains('Name is required', $errors);
        $this->assertContains('Quantity is required', $errors);
        $this->assertContains('Final unit price is required', $errors);
    }

    public function testCartEventThrowOnErrorShouldThrow(): void
    {
        $event = $this->createBaseEvent(CartEvent::class);

        $this->expectException(InvalidArgumentException::class);

        CartEventValidator::validate($event, true);
    }

    // --- CartStatusValidator ---

    public function testCartStatusValidShouldPass(): void
    {
        $event = $this->createBaseEvent(CustomEvent::class);
        $event->setAction('cart.status');
        $params = new DefaultParamSource();
        $product = new Product();
        $product->setSku('sku1');
        $params->setAdditionalData([
            'source' => new EventSource(EventSource::W_E_B__D_E_S_K_T_O_P),
            'total_amount' => 99.99,
            'total_quantity' => 2.0,
            'products' => [$product],
        ]);
        $event->setParams($params);

        $errors = CartStatusValidator::validate($event, false);

        $this->assertEmpty($errors);
    }

    public function testCartStatusMissingFieldsShouldReturnErrors(): void
    {
        $event = $this->createBaseEvent(CustomEvent::class);
        $event->setAction('cart.status');
        $params = new DefaultParamSource();
        $params->setAdditionalData([]);
        $event->setParams($params);

        $errors = CartStatusValidator::validate($event, false);

        $this->assertContains('Event source is required', $errors);
        $this->assertContains('Total amount is required', $errors);
        $this->assertContains('Total quantity is required', $errors);
        $this->assertContains('Products required', $errors);
    }

    public function testCartStatusMissingActionShouldReturnError(): void
    {
        $event = $this->createBaseEvent(CustomEvent::class);
        $params = new DefaultParamSource();
        $params->setAdditionalData([]);
        $event->setParams($params);

        $errors = CartStatusValidator::validate($event, false);

        $this->assertContains('Action is required', $errors);
    }

    // --- AppearedInLocationValidator ---

    public function testAppearedInLocationValidShouldPass(): void
    {
        $event = $this->createBaseEvent(AppearedInLocationEvent::class);
        $params = new AppearedInLocationEventParams();
        $params->setLat(52.2297);
        $params->setLon(21.0122);
        $event->setParams($params);

        $errors = AppearedInLocationValidator::validate($event, false);

        $this->assertEmpty($errors);
    }

    public function testAppearedInLocationMissingCoordsShouldReturnErrors(): void
    {
        $event = $this->createBaseEvent(AppearedInLocationEvent::class);
        $params = new AppearedInLocationEventParams();
        $event->setParams($params);

        $errors = AppearedInLocationValidator::validate($event, false);

        $this->assertContains('Lat is required', $errors);
        $this->assertContains('Lon is required', $errors);
    }

    public function testAppearedInLocationMissingParamsShouldReturnError(): void
    {
        $event = $this->createBaseEvent(AppearedInLocationEvent::class);

        $errors = AppearedInLocationValidator::validate($event, false);

        $this->assertContains('Params are required', $errors);
    }

    // --- ApplicationStartedValidator ---

    public function testApplicationStartedValidShouldPass(): void
    {
        $event = $this->createBaseEvent(ApplicationStartedEvent::class);
        $params = new ApplicationStartedEventParams();
        $params->setApplicationName('TestApp');
        $params->setVersion('1.0.0');
        $event->setParams($params);

        $errors = ApplicationStartedValidator::validate($event, false);

        $this->assertEmpty($errors);
    }

    public function testApplicationStartedMissingFieldsShouldReturnErrors(): void
    {
        $event = $this->createBaseEvent(ApplicationStartedEvent::class);
        $params = new ApplicationStartedEventParams();
        $event->setParams($params);

        $errors = ApplicationStartedValidator::validate($event, false);

        $this->assertContains('Application name is required', $errors);
        $this->assertContains('Version is required', $errors);
    }

    public function testApplicationStartedMissingParamsShouldReturnError(): void
    {
        $event = $this->createBaseEvent(ApplicationStartedEvent::class);

        $errors = ApplicationStartedValidator::validate($event, false);

        $this->assertContains('Params are required', $errors);
        // Should NOT crash on null params access
        $this->assertNotContains('Application name is required', $errors);
    }

    // --- AssignedToCompanyValidator ---

    public function testAssignedToCompanyMissingParamsShouldReturnError(): void
    {
        // AssignedToCompanyPostRequestBody is not in lib/V4/Models,
        // so we use EventBase directly to test the "missing params" path
        $event = $this->createBaseEvent(CustomEvent::class);
        $event->setAction('test');

        $errors = AssignedToCompanyValidator::validate($event, false);

        $this->assertContains('Params are required', $errors);
        // Should NOT crash on null params access
        $this->assertNotContains('Company id is required', $errors);
    }

    // --- CancelledTransactionValidator ---

    public function testCancelledTransactionValidShouldPass(): void
    {
        $event = $this->createBaseEvent(CancelledTransactionEvent::class);
        $params = new CancelledTransactionEventParams();
        $params->setOrderId('order-123');
        $event->setParams($params);

        $errors = CancelledTransactionValidator::validate($event, false);

        $this->assertEmpty($errors);
    }

    public function testCancelledTransactionMissingOrderIdShouldReturnError(): void
    {
        $event = $this->createBaseEvent(CancelledTransactionEvent::class);
        $params = new CancelledTransactionEventParams();
        $event->setParams($params);

        $errors = CancelledTransactionValidator::validate($event, false);

        $this->assertContains('Order id is required', $errors);
    }

    public function testCancelledTransactionMissingParamsShouldReturnError(): void
    {
        $event = $this->createBaseEvent(CancelledTransactionEvent::class);

        $errors = CancelledTransactionValidator::validate($event, false);

        $this->assertContains('Params are required', $errors);
        $this->assertNotContains('Order id is required', $errors);
    }

    // --- ItemSearchClickValidator ---

    public function testItemSearchClickValidShouldPass(): void
    {
        $event = $this->createBaseEvent(ItemSearchClickEventData::class);
        $params = new ItemSearchClickEventDataParams();
        $params->setCorrelationId('corr-123');
        $params->setItem('item-456');
        $params->setPosition(1);
        $params->setSearchType(new SearchType(SearchType::FULL_TEXT_SEARCH));
        $event->setParams($params);

        $errors = ItemSearchClickValidator::validate($event, false);

        $this->assertEmpty($errors);
    }

    public function testItemSearchClickMissingFieldsShouldReturnErrors(): void
    {
        $event = $this->createBaseEvent(ItemSearchClickEventData::class);
        $params = new ItemSearchClickEventDataParams();
        $event->setParams($params);

        $errors = ItemSearchClickValidator::validate($event, false);

        $this->assertContains('Correlation id is required', $errors);
        $this->assertContains('Item is required', $errors);
        $this->assertContains('Position is required', $errors);
        $this->assertContains('Search type is required', $errors);
    }

    public function testItemSearchClickMissingParamsShouldReturnError(): void
    {
        $event = $this->createBaseEvent(ItemSearchClickEventData::class);

        $errors = ItemSearchClickValidator::validate($event, false);

        $this->assertContains('Params are required', $errors);
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

    private function createBaseCartEvent(): CartEvent
    {
        $event = $this->createBaseEvent(CartEvent::class);
        $params = new CartEventParams();
        $params->setSource(new EventSource(EventSource::W_E_B__D_E_S_K_T_O_P));
        $params->setSku('sku-123');
        $params->setName('Test Product');
        $params->setQuantity(1.0);

        $finalPrice = new FinalUnitPrice();
        $finalPrice->setAmount(99.99);
        $finalPrice->setCurrency('USD');
        $params->setFinalUnitPrice($finalPrice);

        $event->setParams($params);

        return $event;
    }
}
