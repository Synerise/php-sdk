<?php

namespace Synerise\Sdk\Api\Validation\Models;

class UnitPriceValidator
{
    /**
     * Validate unit price
     * @param mixed $price
     * @return array
     */
    public static function validate($price): array
    {
        $invalid = [];
        if (null === $price->getAmount()) {
            $invalid[] = 'Amount cannot be empty';
        }
        if (null === $price->getCurrency()) {
            $invalid[] = 'Currency cannot be empty';
        } elseif (strlen($price->getCurrency()) != 3) {
            $invalid[] = "Invalid currency format({$price->getCurrency()})";
        }

        return $invalid;
    }
}
