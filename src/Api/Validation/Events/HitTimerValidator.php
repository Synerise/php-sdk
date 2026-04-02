<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Models\EventBase;
use Synerise\Api\V4\Models\HitTimerEvent;

class HitTimerValidator implements Validator
{
    /**
     * Validate HitTimerEvent.
     * @param HitTimerEvent $event
     * @inheritDoc
     * @return array<int, string>
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array
    {
        $invalid = EventBaseValidator::validate($event, false);

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'HitTimerEvent validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}
