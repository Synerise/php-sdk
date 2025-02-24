<?php

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Events\CancelledTransaction\CancelledTransactionPostRequestBody;
use Synerise\Api\V4\Models\EventBase;

class CancelledTransactionValidator implements Validator
{
    /**
     * Validate CancelledTransactionPostRequestBody.
     * @param CancelledTransactionPostRequestBody $event
     * @inheritDoc
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array
    {
        $invalid = EventBaseValidator::validate($event, false);
        $params = $event->getParams();
        if (empty($params)) {
            $invalid[] = 'Params are required';
        }
        if (empty($params->getOrderId())) {
            $invalid[] = 'Order id is required';
        }

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'CancelledTransactionPostRequestBody validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}