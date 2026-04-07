<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Validation;

class EmailValidator
{
    public const EMAIL_PATTERN = '/^(?!.*\.\.)(?!.*\.$)(?!^\.)(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@(?!-)(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z]{2,}|(\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\])$/';

    /**
     * Validate email
     *
     * @param string|null $email
     * @return array<int, string>
     */
    public static function validate(?string $email): array
    {
        $errors = [];

        if ($email === null) {
            return $errors;
        }

        if (!preg_match(self::EMAIL_PATTERN, $email)) {
            $errors[] = sprintf(
                'Invalid email address format: %s. ' .
                'The email address must be in a valid format, e.g., "name@domain.com" ' .
                'or "first.last@sub.domain.com".',
                $email,
            );
        }

        return $errors;
    }
}
