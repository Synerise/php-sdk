<?php

declare(strict_types=1);

namespace Tests\Synerise\Sdk\Api\RequestBody\Models;

use PHPUnit\Framework\TestCase;
use Synerise\Api\V4\Models\DiscountPrice;
use Synerise\Api\V4\Models\FinalUnitPrice;
use Synerise\Api\V4\Models\NetUnitPrice;
use Synerise\Api\V4\Models\Product;
use Synerise\Api\V4\Models\RegularPrice;
use Synerise\Sdk\Api\RequestBody\Models\ProductBuilder;

class ProductBuilderTest extends TestCase
{
    private ProductBuilder $productBuilder;

    protected function setUp(): void
    {
        $this->productBuilder = ProductBuilder::initialize();
    }

    public function testInitialize(): void
    {
        $builder = ProductBuilder::initialize();
        $this->assertInstanceOf(ProductBuilder::class, $builder);
    }

    public function testBasicProductInfoShouldPass(): void
    {
        $finalUnitPrice = new FinalUnitPrice();
        $finalUnitPrice->setCurrency('USD');
        $finalUnitPrice->setAmount(10);

        $product = $this->productBuilder
            ->setName('Product 1')
            ->setSku('sku1')
            ->setFinalUnitPrice($finalUnitPrice)
            ->build();

        $this->assertEquals('Product 1', $product->getName());
        $this->assertEquals('sku1', $product->getSku());
        $this->assertEquals(10, $product->getFinalUnitPrice()->getAmount());
        $this->assertEquals('USD', $product->getFinalUnitPrice()->getCurrency());
    }

    public function testSetCategories(): void
    {
        $finalUnitPrice = new FinalUnitPrice();
        $finalUnitPrice->setCurrency('USD');
        $finalUnitPrice->setAmount(10);

        $product = $this->productBuilder
            ->setName('Product 1')
            ->setSku('sku1')
            ->setFinalUnitPrice($finalUnitPrice)
            ->setCategories(['category1 > subcategory1', 'category1 > subcategory2'])
            ->build();

        $this->assertCount(2, $product->getCategories());
        $this->assertEquals('category1 > subcategory1', $product->getCategories()[0]);
    }

    public function testSetDiscountPercent(): void
    {
        $finalUnitPrice = new FinalUnitPrice();
        $finalUnitPrice->setCurrency('USD');
        $finalUnitPrice->setAmount(10);

        $product = $this->productBuilder
            ->setName('Product 1')
            ->setSku('sku1')
            ->setFinalUnitPrice($finalUnitPrice)
            ->setDiscountPercent(25)
            ->build();

        $this->assertEquals(25, $product->getDiscountPercent());
    }

    public function testSetDiscountPrice(): void
    {
        $finalUnitPrice = new FinalUnitPrice();
        $finalUnitPrice->setCurrency('USD');
        $finalUnitPrice->setAmount(10);

        $discountPrice = new DiscountPrice();
        $discountPrice->setCurrency('USD');
        $discountPrice->setAmount(2.5);

        $product = $this->productBuilder
        ->setName('Product 1')
        ->setSku('sku1')
        ->setFinalUnitPrice($finalUnitPrice)
        ->setDiscountPrice($discountPrice)
        ->build();

        $this->assertEquals(2.5, $product->getDiscountPrice()->getAmount());
        $this->assertEquals('USD', $product->getDiscountPrice()->getCurrency());
    }

    public function testSetImage(): void
    {
        $finalUnitPrice = new FinalUnitPrice();
        $finalUnitPrice->setCurrency('USD');
        $finalUnitPrice->setAmount(10);

        $product = $this->productBuilder
            ->setName('Product 1')
            ->setSku('sku1')
            ->setFinalUnitPrice($finalUnitPrice)
            ->setImage('https://example.com')
            ->build();

        $this->assertEquals('https://example.com', $product->getImage());
    }

    public function testSetUrl(): void
    {
        $finalUnitPrice = new FinalUnitPrice();
        $finalUnitPrice->setCurrency('USD');
        $finalUnitPrice->setAmount(10);

        $product = $this->productBuilder
            ->setName('Product 1')
            ->setSku('sku1')
            ->setFinalUnitPrice($finalUnitPrice)
            ->setUrl('https://example.com')
            ->build();

        $this->assertEquals('https://example.com', $product->getUrl());
    }

    public function testSetNetUnitPrice(): void
    {
        $finalUnitPrice = new FinalUnitPrice();
        $finalUnitPrice->setCurrency('USD');
        $finalUnitPrice->setAmount(10);

        $netUnitPrice = new NetUnitPrice();
        $netUnitPrice->setCurrency('USD');
        $netUnitPrice->setAmount(12);

        $product = $this->productBuilder
            ->setName('Product 1')
            ->setSku('sku1')
            ->setFinalUnitPrice($finalUnitPrice)
            ->setNetUnitPrice($netUnitPrice)
            ->build();

        $this->assertEquals(12, $product->getNetUnitPrice()->getAmount());
        $this->assertEquals('USD', $product->getNetUnitPrice()->getCurrency());
    }

    public function testSetRegularPrice(): void
    {
        $finalUnitPrice = new FinalUnitPrice();
        $finalUnitPrice->setCurrency('USD');
        $finalUnitPrice->setAmount(10);

        $regularPrice = new RegularPrice();
        $regularPrice->setCurrency('USD');
        $regularPrice->setAmount(11);

        $product = $this->productBuilder
            ->setName('Product 1')
            ->setSku('sku1')
            ->setFinalUnitPrice($finalUnitPrice)
            ->setRegularPrice($regularPrice)
            ->build();

        $this->assertEquals(11, $product->getRegularPrice()->getAmount());
        $this->assertEquals('USD', $product->getRegularPrice()->getCurrency());
    }

    public function testSetQuantity(): void
    {
        $finalUnitPrice = new FinalUnitPrice();
        $finalUnitPrice->setCurrency('USD');
        $finalUnitPrice->setAmount(10);

        $product = $this->productBuilder
            ->setName('Product 1')
            ->setSku('sku1')
            ->setFinalUnitPrice($finalUnitPrice)
            ->setQuantity(2)
            ->build();

        $this->assertEquals(2, $product->getQuantity());
    }

    public function testSetTax(): void
    {
        $finalUnitPrice = new FinalUnitPrice();
        $finalUnitPrice->setCurrency('USD');
        $finalUnitPrice->setAmount(10);

        $product = $this->productBuilder
            ->setName('Product 1')
            ->setSku('sku1')
            ->setFinalUnitPrice($finalUnitPrice)
            ->setTax(12)
            ->build();

        $this->assertEquals(12, $product->getTax());
    }

    public function testBuildWithoutValidation(): void
    {
        $product = $this->productBuilder->build(false);

        $this->assertInstanceOf(Product::class, $product);
    }
}
