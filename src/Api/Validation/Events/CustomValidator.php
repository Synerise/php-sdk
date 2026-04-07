<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Models\CustomEvent;
use Synerise\Api\V4\Models\EventBase;

class CustomValidator implements Validator
{
    /**
     * Validate CustomEvent.
     * @param CustomEvent $event
     * @inheritDoc
     * @return array<int, string>
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array
    {
        $invalid = EventBaseValidator::validate($event, false);

        if (empty($event->getAction())) {
            $invalid[] = 'Action is required';
        }

        $params = $event->getParams();
        if (empty($params)) {
            $invalid[] = 'Params are required';
        }

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'CustomEvent validation failed: ' . implode(', ', $invalid),
            );
        }

        return $invalid;
    }
}
