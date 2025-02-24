<?php

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Events\Custom\CustomPostRequestBody;
use Synerise\Api\V4\Models\EventBase;

class CustomValidator implements Validator
{
    /**
     * Validate CustomPostRequestBody.
     * @param CustomPostRequestBody $event
     * @inheritDoc
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
                'CustomPostRequestBody validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}