<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Validation;

class TimeValidator
{
    public const TIME_ISO8601_PATTERN = '/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}(\.?\d+)?(([+-]\d{2}:\d{2})|Z)?$/i';

    /**
     * Validate time [ISO 8601].
     * @param string|null $time
     * @return array<int, string>
     */
    public static function validate(?string $time): array
    {
        $errors = [];

        if (null === $time) {
            return $errors;
        }

        if (!preg_match(self::TIME_ISO8601_PATTERN, $time)) {
            $errors[] = sprintf(
                'Invalid time format: %s. '.
                'The datetime must follow the ISO 8601 standard (e.g., "2022-10-14T12:02:06Z" or "2022-10-14T15:00:00+01:00"). '.
                'The value should include date, time, and an optional timezone (Z or ±hh:mm).',
                $time
            );
        }

        return $errors;
    }
}
