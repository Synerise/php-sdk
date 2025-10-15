<?php

namespace Synerise\Tests\Api\Validation\Models;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Synerise\Api\V4\Models\Attributes;
use Synerise\Api\V4\Models\DiscountPrice;
use Synerise\Api\V4\Models\FinalUnitPrice;
use Synerise\Api\V4\Models\NetUnitPrice;
use Synerise\Api\V4\Models\Product;
use Synerise\Api\V4\Models\Profile;
use Synerise\Api\V4\Models\RegularPrice;
use Synerise\Sdk\Api\Validation\Models\ProductValidator;
use Synerise\Sdk\Api\Validation\Models\ProfileValidator;

class ProductValidatorTest extends TestCase
{
    public function testValidProductShouldPassValidation(): void
    {
        // Arrange
        $product = new Product();
        $product->setName('Product 1');
        $product->setSku('sku1');
        $product->setQuantity(1);

        $netUnitPrice = new NetUnitPrice();
        $netUnitPrice->setCurrency('USD');
        $netUnitPrice->setAmount(129);
        $product->setNetUnitPrice($netUnitPrice);

        $regularPrice = new RegularPrice();
        $regularPrice->setCurrency('USD');
        $regularPrice->setAmount(99.99);
        $product->setRegularPrice($regularPrice);

        $finalUnitPrice = new FinalUnitPrice();
        $finalUnitPrice->setCurrency('USD');
        $finalUnitPrice->setAmount(79.99);
        $product->setFinalUnitPrice($finalUnitPrice);

        $discountPrice = new DiscountPrice();
        $discountPrice->setCurrency('USD');
        $discountPrice->setAmount(20);
        $product->setDiscountPrice($discountPrice);

        // Act
        $errors = ProductValidator::validate($product, false);

        // Assert
        $this->assertEmpty($errors);
    }

    public function testProfileWithoutSkuAndNameShouldReturnErrors(): void
    {
        // Arrange
        $product = new Product();

        $netUnitPrice = new NetUnitPrice();
        $netUnitPrice->setCurrency('USD');
        $netUnitPrice->setAmount(129);
        $product->setNetUnitPrice($netUnitPrice);

        $regularPrice = new RegularPrice();
        $regularPrice->setCurrency('USD');
        $regularPrice->setAmount(99.99);
        $product->setRegularPrice($regularPrice);

        $finalUnitPrice = new FinalUnitPrice();
        $finalUnitPrice->setCurrency('USD');
        $finalUnitPrice->setAmount(79.99);
        $product->setFinalUnitPrice($finalUnitPrice);

        $discountPrice = new DiscountPrice();
        $discountPrice->setCurrency('USD');
        $discountPrice->setAmount(20);
        $product->setDiscountPrice($discountPrice);

        // Act
        $errors = ProductValidator::validate($product, false);

        // Assert
        $this->assertCount(2, $errors);
        $this->assertStringContainsString('Sku is required', $errors[0]);
        $this->assertStringContainsString('Name is required', $errors[1]);
    }

    public function testProfileWithInvalidPricesShouldReturnErrors(): void
    {
        // Arrange
        $product = new Product();
        $product->setName('Product 1');
        $product->setSku('sku1');
        $product->setQuantity(1);

        $netUnitPrice = new NetUnitPrice();
        $netUnitPrice->setAmount(129);
        $product->setNetUnitPrice($netUnitPrice);

        $regularPrice = new RegularPrice();
        $regularPrice->setCurrency('USD');
        $product->setRegularPrice($regularPrice);

        $discountPrice = new DiscountPrice();
        $discountPrice->setCurrency('INVALID_CURRENCY');
        $discountPrice->setAmount(20);
        $product->setDiscountPrice($discountPrice);

        // Act
        $errors = ProductValidator::validate($product, false);

        // Assert
        $this->assertCount(4, $errors);
        $this->assertStringContainsString('Final unit price is required', $errors[0]);
        $this->assertStringContainsString('Invalid currency format', $errors[1]);
        $this->assertStringContainsString('Currency cannot be empty', $errors[2]);
        $this->assertStringContainsString('Amount cannot be empty', $errors[3]);
    }

    public function testValidationShouldThrowExceptionWhenEnabled(): void
    {
        // Arrange
        $product = new Product();

        // Assert
        $this->expectException(InvalidArgumentException::class);

        // Act
        ProductValidator::validate($product, true);
    }
}
