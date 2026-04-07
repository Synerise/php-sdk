<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Validation\Models;

use InvalidArgumentException;
use Synerise\Api\V4\Models\Product;
use Synerise\Api\V4\Models\Transaction;
use Synerise\Sdk\Api\Validation\TimeValidator;

class TransactionValidator
{
    /**
     * Validate Transaction
     * @param Transaction $transaction
     * @return array<int, string>
     */
    public static function validate(Transaction $transaction, bool $throwOnError = true): array
    {
        $errors = [];

        $productErrors = self::validateProducts($transaction->getProducts());
        $errors = array_merge($errors, $productErrors);

        $client = $transaction->getClient();
        $clientErrors = $client !== null ? ClientValidator::validate($client) : ['Client is required'];
        $errors = array_merge($errors, $clientErrors);

        if (!empty($transaction->getDiscountAmount())) {
            $discountErrors = UnitPriceValidator::validate($transaction->getDiscountAmount());
            $errors = array_merge($errors, $discountErrors);
        }

        if (!empty($transaction->getRecordedAt())) {
            $recordedAtErrors = TimeValidator::validate($transaction->getRecordedAt());
            $errors = array_merge($errors, $recordedAtErrors);
        }

        $revenueErrors = UnitPriceValidator::validate($transaction->getRevenue());
        $errors = array_merge($errors, $revenueErrors);

        $valueErrors = UnitPriceValidator::validate($transaction->getValue());
        $errors = array_merge($errors, $valueErrors);

        if ($throwOnError && !empty($errors)) {
            throw new InvalidArgumentException('Transaction validation failed: ' . implode(', ', $errors));
        }

        return $errors;
    }

    /**
     * @param array<int, Product>|null $products
     * @return array<int, string>
     */
    private static function validateProducts(?array $products): array
    {
        $errors = [];

        if (empty($products)) {
            return $errors;
        }

        foreach ($products as $product) {
            $productErrors = ProductValidator::validate($product, false);
            $errors = array_merge($errors, $productErrors);
        }

        return $errors;
    }
}
