<?php

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Events\LoggedOut\LoggedOutPostRequestBody;
use Synerise\Api\V4\Models\EventBase;
use Synerise\Api\V4\Models\EventSource;

class LoggedOutValidator implements Validator
{
    /**
     * Validate LoggedInPostRequestBody.
     * @param LoggedOutPostRequestBody $event
     * @inheritDoc
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array
    {
        $invalid = EventBaseValidator::validate($event, false);
        $params = $event->getParams();
        if (empty($params)) {
            $invalid[] = 'Params are required';
        }
        $additionalData = $params->getAdditionalData();
        if (!isset($additionalData['source']) && !is_a($additionalData['source'], EventSource::class)) {
            $invalid[] = 'Event source is required';
        }

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'LoggedInPostRequestBody validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}