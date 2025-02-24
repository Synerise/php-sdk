<?php

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Events\HitTimer\HitTimerPostRequestBody;
use Synerise\Api\V4\Models\EventBase;

class HitTimerValidator implements Validator
{
    /**
     * Validate HitTimerPostRequestBody.
     * @param HitTimerPostRequestBody $event
     * @inheritDoc
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array
    {
        $invalid = EventBaseValidator::validate($event, false);

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'HitTimerPostRequestBody validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}