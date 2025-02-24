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
    public static function validate(Product $product): array
    {
        $invalid = [];
        if (empty($product->getSku())) {
            $invalid[] = 'Sku is required';
        }
        if (empty($product->getName())) {
            $invalid[] = 'Name is required';
        }
        if (empty($product->getFinalUnitPrice())) {
            $invalid[] = 'Final unit price is required';
        } else {
            $invalid += UnitPriceValidator::validate($product->getFinalUnitPrice());
        }
        if (!empty($product->getDiscountPrice())) {
            $invalid += UnitPriceValidator::validate($product->getDiscountPrice());
        }
        if (!empty($product->getNetUnitPrice())) {
            $invalid += UnitPriceValidator::validate($product->getNetUnitPrice());
        }
        if (!empty($product->getRegularPrice())) {
            $invalid += UnitPriceValidator::validate($product->getRegularPrice());
        }

        return $invalid;
    }
}