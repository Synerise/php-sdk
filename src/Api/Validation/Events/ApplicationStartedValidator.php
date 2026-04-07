<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Models\ApplicationStartedEvent;
use Synerise\Api\V4\Models\EventBase;

class ApplicationStartedValidator implements Validator
{
    /**
     * Validate ApplicationStartedEvent.
     * @param ApplicationStartedEvent $event
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
            if (empty($params->getApplicationName())) {
                $invalid[] = 'Application name is required';
            }
            if (empty($params->getVersion())) {
                $invalid[] = 'Version is required';
            }
        }

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'ApplicationStartedEvent validation failed: ' . implode(', ', $invalid),
            );
        }

        return $invalid;
    }
}
