<?php

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Models\ClientCartEventRequest;
use Synerise\Api\V4\Models\EventBase;
use Synerise\Sdk\Api\Validation\Models\UnitPriceValidator;

class CartEventValidator implements Validator
{
    /**
     * Validate ClientCartEventRequest.
     * @param ClientCartEventRequest $event
     * @inheritDoc
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array
    {
        $invalid = EventBaseValidator::validate($event, false);
        $params = $event->getParams();
        if (empty($params)) {
            $invalid[] = 'Params are required';
        } else {
            if (empty($params->getSource())) {
                $invalid[] = 'Event source is required';
            }
            if (empty($params->getSku())) {
                $invalid[] = 'Sku is required';
            }
            if (empty($params->getName())) {
                $invalid[] = 'Name is required';
            }
            if (empty($params->getQuantity())) {
                $invalid[] = 'Quantity is required';
            }
            if (empty($params->getFinalUnitPrice())) {
                $invalid[] = 'Final unit price is required';
            } else {
                $invalid += UnitPriceValidator::validate($params->getFinalUnitPrice());
            }
            if (!empty($params->getDiscountedUnitPrice())) {
                $invalid += UnitPriceValidator::validate($params->getDiscountedUnitPrice());
            }
            if (!empty($params->getRegularUnitPrice())) {
                $invalid += UnitPriceValidator::validate($params->getRegularUnitPrice());
            }
        }

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'ClientCartEventRequest validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}