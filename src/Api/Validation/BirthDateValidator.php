<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Validation;

use DateTime;

class BirthDateValidator
{
    public const DATE_FORMAT = 'Y-m-d';
    public const MINIMUM_DATE = '1900-01-01';

    /**
     * Validate birthDate
     *
     * @param string|null $birthDate
     * @return array<int, string>
     */
    public static function validate(?string $birthDate): array
    {
        $errors = [];

        if ($birthDate === null) {
            return $errors;
        }

        if (!self::isValidDateFormat($birthDate)) {
            $errors[] = sprintf(
                'Date of birth must be in the format %s, received: %s',
                self::DATE_FORMAT,
                $birthDate,
            );

            return $errors;
        }

        $birthDateTime = DateTime::createFromFormat(self::DATE_FORMAT, $birthDate);
        $minimumDateTime = DateTime::createFromFormat(self::DATE_FORMAT, self::MINIMUM_DATE);

        if ($birthDateTime < $minimumDateTime) {
            $errors[] = sprintf(
                'Date of birth cannot be earlier than %s, received: %s',
                self::MINIMUM_DATE,
                $birthDate,
            );
        }

        $today = new DateTime('today');
        if ($birthDateTime > $today) {
            $errors[] = sprintf(
                'Date of birth cannot be in the future, received: %s',
                $birthDate,
            );
        }

        return $errors;
    }

    /**
     * Sprawdza czy data jest w poprawnym formacie YYYY-MM-DD
     */
    public static function isValidDateFormat(string $date): bool
    {
        $dateTime = DateTime::createFromFormat(self::DATE_FORMAT, $date);
        return $dateTime !== false && $dateTime->format(self::DATE_FORMAT) === $date;
    }

}
