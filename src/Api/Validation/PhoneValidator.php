<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Validation;

class PhoneValidator
{
    public const PHONE_PATTERN = '/^(?:\+[0-9 \-()\/]{6,19}|[0-9 \-()\/]{6,20})$/';

    /**
     * Validate phone number
     *
     * @param string|null $phone
     * @return array<int, string>
     */
    public static function validate(?string $phone): array
    {
        $errors = [];

        if ($phone === null) {
            return $errors;
        }

        if (!preg_match(self::PHONE_PATTERN, $phone)) {
            $errors[] = sprintf(
                'Invalid phone number format: %s. ' .
                'The phone number should be 6–20 characters long (digits, spaces, dashes, parentheses, or slashes). ' .
                'It may start with a "+" (in that case, up to 19 characters after the "+").',
                $phone,
            );
        }

        return $errors;
    }
}
