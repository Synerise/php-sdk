<?php

declare(strict_types=1);

namespace Synerise\Tests\Api\Validation\Models;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DiscountAmount;
use Synerise\Api\V4\Models\DiscountPrice;
use Synerise\Api\V4\Models\FinalUnitPrice;
use Synerise\Api\V4\Models\Product;
use Synerise\Api\V4\Models\RegularPrice;
use Synerise\Api\V4\Models\Revenue;
use Synerise\Api\V4\Models\Transaction;
use Synerise\Api\V4\Models\Value;
use Synerise\Sdk\Api\Validation\Models\TransactionValidator;

class TransactionValidatorTest extends TestCase
{
    public function testValidTransactionShouldPassValidation(): void
    {
        // Arrange
        $client = new Client();
        $client->setEmail('test@example.com');

        $value = new Value();
        $value->setAmount(99.99);
        $value->setCurrency('USD');

        $revenue = new Revenue();
        $revenue->setAmount(120);
        $revenue->setCurrency('USD');

        $discountAmount = new DiscountAmount();
        $discountAmount->setAmount(10);
        $discountAmount->setCurrency('USD');

        $product = new Product();
        $product->setName('Product');
        $product->setQuantity(1);
        $product->setSku('1');
        $regularPrice = new RegularPrice();
        $regularPrice->setCurrency('USD');
        $regularPrice->setAmount(130);
        $product->setRegularPrice($regularPrice);
        $finalUnitPrice = new FinalUnitPrice();
        $finalUnitPrice->setCurrency('USD');
        $finalUnitPrice->setAmount(120);
        $product->setFinalUnitPrice($finalUnitPrice);
        $discountPrice = new DiscountPrice();
        $discountPrice->setCurrency('USD');
        $discountPrice->setAmount(10);
        $product->setDiscountPrice($discountPrice);
        $products = [$product];

        $transaction = new Transaction();
        $transaction->setClient($client);
        $transaction->setValue($value);
        $transaction->setRevenue($revenue);
        $transaction->setDiscountAmount($discountAmount);
        $transaction->setProducts($products);

        // Act
        $errors = TransactionValidator::validate($transaction, false);

        // Assert
        $this->assertEmpty($errors);
    }

    public function testTransactionWithInvalidProductShouldReturnErrors(): void
    {
        // Arrange
        $transaction = new Transaction();

        $client = new Client();
        $client->setEmail('test@example.com');

        $value = new Value();
        $value->setAmount(99.99);
        $value->setCurrency('USD');

        $revenue = new Revenue();
        $revenue->setAmount(120);
        $revenue->setCurrency('USD');

        $product = new Product();
        $regularPrice = new RegularPrice();
        $regularPrice->setCurrency('INVALID_CURRENCY');
        $regularPrice->setAmount(130);
        $product->setRegularPrice($regularPrice);
        $discountPrice = new DiscountPrice();
        $discountPrice->setCurrency(null);
        $discountPrice->setAmount(null);
        $product->setDiscountPrice($discountPrice);
        $products = [$product];

        $transaction->setClient($client);
        $transaction->setValue($value);
        $transaction->setRevenue($revenue);
        $transaction->setProducts($products);

        // Act
        $errors = TransactionValidator::validate($transaction, false);

        // Assert
        $this->assertCount(6, $errors);
        $this->assertStringContainsString('Sku is required', $errors[0]);
        $this->assertStringContainsString('Name is required', $errors[1]);
        $this->assertStringContainsString('Final unit price is required', $errors[2]);
        $this->assertStringContainsString('Amount cannot be empty', $errors[3]);
        $this->assertStringContainsString('Currency cannot be empty', $errors[4]);
        $this->assertStringContainsString('Invalid currency format', $errors[5]);
    }

    public function testTransactionWithInvalidClientShouldReturnErrors(): void
    {
        // Arrange
        $transaction = new Transaction();

        $client = new Client();

        $value = new Value();
        $value->setAmount(99.99);
        $value->setCurrency('USD');

        $revenue = new Revenue();
        $revenue->setAmount(120);
        $revenue->setCurrency('USD');

        $transaction->setClient($client);
        $transaction->setValue($value);
        $transaction->setRevenue($revenue);

        // Act
        $errors = TransactionValidator::validate($transaction, false);

        // Assert
        $this->assertCount(1, $errors);
        $this->assertStringContainsString('At least one client identifier required', $errors[0]);
    }

    public function testTransactionWithInvalidPricesShouldReturnErrors(): void
    {
        // Arrange
        $transaction = new Transaction();

        $client = new Client();
        $client->setEmail('test@example.com');

        $value = new Value();
        $value->setAmount(99.99);

        $revenue = new Revenue();
        $revenue->setCurrency('USD');

        $transaction->setClient($client);
        $transaction->setValue($value);
        $transaction->setRevenue($revenue);

        // Act
        $errors = TransactionValidator::validate($transaction, false);

        // Assert
        $this->assertCount(2, $errors);
        $this->assertStringContainsString('Amount cannot be empty', $errors[0]);
        $this->assertStringContainsString('Currency cannot be empty', $errors[1]);
    }

    public function testTransactionWithInvalidTimeShouldReturnErrors(): void
    {
        // Arrange
        $transaction = new Transaction();

        $client = new Client();
        $client->setEmail('test@example.com');

        $value = new Value();
        $value->setAmount(99.99);
        $value->setCurrency('USD');

        $revenue = new Revenue();
        $revenue->setAmount(120);
        $revenue->setCurrency('USD');

        $transaction->setClient($client);
        $transaction->setValue($value);
        $transaction->setRevenue($revenue);
        $transaction->setRecordedAt('2020.01.01');

        // Act
        $errors = TransactionValidator::validate($transaction, false);

        // Assert
        $this->assertCount(1, $errors);
        $this->assertStringContainsString('Invalid time format', $errors[0]);
    }

    public function testValidationShouldThrowExceptionWhenEnabled(): void
    {
        // Arrange
        $transaction = new Transaction();

        $client = new Client();

        $value = new Value();

        $revenue = new Revenue();

        $transaction->setClient($client);
        $transaction->setValue($value);
        $transaction->setRevenue($revenue);

        // Assert
        $this->expectException(InvalidArgumentException::class);

        // Act
        TransactionValidator::validate($transaction, true);
    }
}
