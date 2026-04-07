<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Models\EventBase;
use Synerise\Api\V4\Models\EventSource;
use Synerise\Api\V4\Models\LoggedOutEvent;

class LoggedOutValidator implements Validator
{
    /**
     * Validate LoggedOutEvent.
     * @param LoggedOutEvent $event
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
            $additionalData = $params->getAdditionalData();
            if (!isset($additionalData['source']) || !($additionalData['source'] instanceof EventSource)) {
                $invalid[] = 'Event source is required';
            }
        }

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'LoggedOutEvent validation failed: ' . implode(', ', $invalid),
            );
        }

        return $invalid;
    }
}
