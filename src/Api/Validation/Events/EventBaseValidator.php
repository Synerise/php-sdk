<?php

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Models\EventBase;
use Synerise\Sdk\Api\Validation\Models\ClientValidator;

class EventBaseValidator implements Validator
{
    /**
     * Pattern for ISO8601 datetime validation
     */
    public const PATTERN_ISO8601 = '@(\d\d\d\d)(-)?(\d\d)(-)?(\d\d)(T)?(\d\d)(:)?(\d\d)(:)?(\d\d)(\.\d+)?(Z|([+-])(\d\d)(:)?(\d\d))@';

    /**
     * Validate EventBase.
     * @inheritDoc
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array
    {
        $invalid = [];
        if (empty($event->getClient())) {
            $invalid[] = 'Client is required';
        } else {
            $invalid += ClientValidator::validate($event->getClient());
        }
        if (empty($event->getLabel())) {
            $invalid[] = 'Label is required';
        }
        if (!self::ISO8601($event->getTime())) {
            $invalid[] = 'Time is not a valid ISO8601 format';
        }

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'EventBase validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }

    /**
     * Validate datetime format is ISO8601
     * @param string $dateTime
     * @return bool
     */
    public static function ISO8601(string $dateTime): bool
    {
        return preg_match(self::PATTERN_ISO8601, $dateTime);
    }

}