<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Validation\Models;

class UnitPriceValidator
{
    /**
     * Validate unit price
     * @param mixed $price
     * @return array<int, string>
     */
    public static function validate($price): array
    {
        $invalid = [];
        if (!is_object($price) || !method_exists($price, 'getAmount') || !method_exists($price, 'getCurrency')) {
            return $invalid;
        }

        if (null === $price->getAmount()) {
            $invalid[] = 'Amount cannot be empty';
        }
        /** @var string|null $currency */
        $currency = $price->getCurrency();
        if (null === $currency) {
            $invalid[] = 'Currency cannot be empty';
        } elseif (strlen($currency) !== 3) {
            $invalid[] = "Invalid currency format({$currency})";
        }

        return $invalid;
    }
}
