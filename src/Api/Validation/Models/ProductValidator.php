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
            $priceErrors = UnitPriceValidator::validate($product->getFinalUnitPrice());
            $invalid = array_merge($invalid, $priceErrors);
        }
        if (!empty($product->getDiscountPrice())) {
            $priceErrors = UnitPriceValidator::validate($product->getDiscountPrice());
            $invalid = array_merge($invalid, $priceErrors);
        }
        if (!empty($product->getNetUnitPrice())) {
            $priceErrors = UnitPriceValidator::validate($product->getNetUnitPrice());
            $invalid = array_merge($invalid, $priceErrors);
        }
        if (!empty($product->getRegularPrice())) {
            $priceErrors = UnitPriceValidator::validate($product->getRegularPrice());
            $invalid = array_merge($invalid, $priceErrors);
        }

        return $invalid;
    }
}
