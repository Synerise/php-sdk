<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\RequestBody\Events;

use PHPUnit\Framework\TestCase;
use Synerise\Api\V4\Models\CartEvent;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DiscountedUnitPrice;
use Synerise\Api\V4\Models\EventSource;
use Synerise\Api\V4\Models\FinalUnitPrice;
use Synerise\Api\V4\Models\RegularUnitPrice;
use Synerise\Sdk\Api\RequestBody\Events\AddedToCartBuilder;
use Synerise\Sdk\Api\RequestBody\Events\RemovedFromCartBuilder;
use Synerise\Sdk\Api\Validation\Events\CartEventValidator;

class CartBuilderTest extends TestCase
{
    public function testAddedToCartInitializeShouldReturnBuilder(): void
    {
        $builder = AddedToCartBuilder::initialize($this->createClient());

        $this->assertInstanceOf(AddedToCartBuilder::class, $builder);
    }

    public function testRemovedFromCartInitializeShouldReturnBuilder(): void
    {
        $builder = RemovedFromCartBuilder::initialize($this->createClient());

        $this->assertInstanceOf(RemovedFromCartBuilder::class, $builder);
    }

    public function testAddedToCartBuildShouldReturnCartEvent(): void
    {
        $builder = $this->createValidCartBuilder(AddedToCartBuilder::class);

        $event = $builder->build(false);

        $this->assertInstanceOf(CartEvent::class, $event);
        $this->assertSame('Item added to cart', $event->getLabel());
    }

    public function testRemovedFromCartBuildShouldReturnCartEvent(): void
    {
        $builder = $this->createValidCartBuilder(RemovedFromCartBuilder::class);

        $event = $builder->build(false);

        $this->assertInstanceOf(CartEvent::class, $event);
        $this->assertSame('Item removed from cart', $event->getLabel());
    }

    public function testSetSkuShouldSetParamValue(): void
    {
        $builder = $this->createValidCartBuilder(AddedToCartBuilder::class);
        $builder->setSku('product-sku-123');

        $event = $builder->build(false);

        $this->assertSame('product-sku-123', $event->getParams()->getSku());
    }

    public function testSetQuantityShouldSetParamValue(): void
    {
        $builder = $this->createValidCartBuilder(AddedToCartBuilder::class);
        $builder->setQuantity(3.0);

        $event = $builder->build(false);

        $this->assertSame(3.0, $event->getParams()->getQuantity());
    }

    public function testSetNameShouldSetParamValue(): void
    {
        $builder = $this->createValidCartBuilder(AddedToCartBuilder::class);
        $builder->setName('Test Product');

        $event = $builder->build(false);

        $this->assertSame('Test Product', $event->getParams()->getName());
    }

    public function testSetFinalUnitPriceShouldSetParamValue(): void
    {
        $builder = $this->createValidCartBuilder(AddedToCartBuilder::class);
        $price = new FinalUnitPrice();
        $price->setAmount(49.99);
        $price->setCurrency('EUR');
        $builder->setFinalUnitPrice($price);

        $event = $builder->build(false);

        $this->assertSame(49.99, $event->getParams()->getFinalUnitPrice()->getAmount());
        $this->assertSame('EUR', $event->getParams()->getFinalUnitPrice()->getCurrency());
    }

    public function testSetOfflineShouldSetParamValue(): void
    {
        $builder = $this->createValidCartBuilder(AddedToCartBuilder::class);
        $builder->setOffline(true);

        $event = $builder->build(false);

        $this->assertTrue($event->getParams()->getOffline());
    }

    public function testSetProducerShouldSetParamValue(): void
    {
        $builder = $this->createValidCartBuilder(AddedToCartBuilder::class);
        $builder->setProducer('TestBrand');

        $event = $builder->build(false);

        $this->assertSame('TestBrand', $event->getParams()->getProducer());
    }

    public function testSetCategoryShouldSetParamValue(): void
    {
        $builder = $this->createValidCartBuilder(AddedToCartBuilder::class);
        $builder->setCategory('Electronics');

        $event = $builder->build(false);

        $this->assertSame('Electronics', $event->getParams()->getCategory());
    }

    public function testSetCategoriesShouldSetParamValue(): void
    {
        $builder = $this->createValidCartBuilder(AddedToCartBuilder::class);
        $builder->setCategories(['Electronics', 'Phones']);

        $event = $builder->build(false);

        $this->assertSame(['Electronics', 'Phones'], $event->getParams()->getCategories());
    }

    public function testSetDiscountedUnitPriceShouldSetParamValue(): void
    {
        $builder = $this->createValidCartBuilder(AddedToCartBuilder::class);
        $price = new DiscountedUnitPrice();
        $price->setAmount(39.99);
        $price->setCurrency('USD');
        $builder->setDiscountedUnitPrice($price);

        $event = $builder->build(false);

        $this->assertSame(39.99, $event->getParams()->getDiscountedUnitPrice()->getAmount());
    }

    public function testSetRegularUnitPriceShouldSetParamValue(): void
    {
        $builder = $this->createValidCartBuilder(AddedToCartBuilder::class);
        $price = new RegularUnitPrice();
        $price->setAmount(59.99);
        $price->setCurrency('USD');
        $builder->setRegularUnitPrice($price);

        $event = $builder->build(false);

        $this->assertSame(59.99, $event->getParams()->getRegularUnitPrice()->getAmount());
    }

    public function testSetSnrsParamsShouldStoreInAdditionalData(): void
    {
        $builder = $this->createValidCartBuilder(AddedToCartBuilder::class);
        $builder->setSnrsParams(['utm_source' => 'email']);

        $event = $builder->build(false);

        $additionalData = $event->getParams()->getAdditionalData();
        $this->assertArrayHasKey('snrsParams', $additionalData);
        $this->assertSame(['utm_source' => 'email'], $additionalData['snrsParams']);
    }

    public function testGetValidatorShouldReturnCartEventValidator(): void
    {
        $validator = AddedToCartBuilder::getValidator();

        $this->assertInstanceOf(CartEventValidator::class, $validator);
    }

    private function createClient(): Client
    {
        $client = new Client();
        $client->setUuid('550e8400-e29b-41d4-a716-446655440000');
        return $client;
    }

    private function createValidCartBuilder(string $builderClass)
    {
        $builder = $builderClass::initialize($this->createClient());
        $builder->setSource(new EventSource(EventSource::W_E_B__D_E_S_K_T_O_P));

        return $builder;
    }
}
