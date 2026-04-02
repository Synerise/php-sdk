<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Models\CancelledTransactionEvent;
use Synerise\Api\V4\Models\EventBase;

class CancelledTransactionValidator implements Validator
{
    /**
     * Validate CancelledTransactionEvent.
     * @param CancelledTransactionEvent $event
     * @inheritDoc
     * @return array<int, string>
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array
    {
        $invalid = EventBaseValidator::validate($event, false);
        $params = $event->getParams();
        if (empty($params)) {
            $invalid[] = 'Params are required';
        } else {
            if (empty($params->getOrderId())) {
                $invalid[] = 'Order id is required';
            }
        }

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'CancelledTransactionEvent validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}
