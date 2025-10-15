<?php

namespace Synerise\Sdk\Api\Validation\Models;

use Synerise\Api\V4\Models\Product;

class ProductValidator
{
    /**
     * Validate Product
     * @param Product $product
     * @return array
     */
    public static function validate(Product $product, bool $throwOnError = true): array
    {
        $errors = [];

        $skuErrors = self::validateSku($product->getSku());
        $errors = array_merge($errors, $skuErrors);

        $nameErrors = self::validateName($product->getName());
        $errors = array_merge($errors, $nameErrors);

        if (null !== $product->getFinalUnitPrice()) {
            $finalUnitPriceErrors = UnitPriceValidator::validate($product->getFinalUnitPrice());
            $errors = array_merge($errors, $finalUnitPriceErrors);
        } else {
            $errors[] = 'Final unit price is required';
        }

        if (null !== $product->getDiscountPrice()) {
            $discountPriceErrors = UnitPriceValidator::validate($product->getDiscountPrice());
            $errors = array_merge($errors, $discountPriceErrors);
        }

        if (null !== $product->getNetUnitPrice()) {
            $netUnitPriceErrors = UnitPriceValidator::validate($product->getNetUnitPrice());
            $errors = array_merge($errors, $netUnitPriceErrors);
        }

        if (null !== $product->getRegularPrice()) {
            $regularPriceErrors = UnitPriceValidator::validate($product->getRegularPrice());
            $errors = array_merge($errors, $regularPriceErrors);
        }

        if ($throwOnError && !empty($errors)) {
            throw new \InvalidArgumentException(
                'Product validation failed: ' . implode(', ', $errors)
            );
        }

        return $errors;
    }

    /**
     * Validate product sku
     *
     * @param string|null $sku
     * @return array
     */
    private static function validateSku(?string $sku): array
    {
        $errors = [];

        if (null === $sku) {
            $errors[] = 'Sku is required';
        }

        return $errors;
    }

    /**
     * Validate product name
     *
     * @param string|null $name
     * @return array
     */
    private static function validateName(?string $name): array
    {
        $errors = [];

        if (null === $name) {
            $errors[] = 'Name is required';
        }

        return $errors;
    }
}
