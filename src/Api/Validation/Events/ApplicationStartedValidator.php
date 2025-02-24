<?php

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Models\ApplicationstartedRequest;
use Synerise\Api\V4\Models\EventBase;

class ApplicationStartedValidator implements Validator
{
    /**
     * Validate ApplicationstartedRequest.
     * @param ApplicationstartedRequest $event
     * @inheritDoc
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array
    {
        $invalid = EventBaseValidator::validate($event, false);
        $params = $event->getParams();
        if (empty($params)) {
            $invalid[] = 'Params are required';
        }
        if (empty($params->getApplicationName())) {
            $invalid[] = 'Application name is required';
        }
        if (empty($params->getVersion())) {
            $invalid[] = 'Version is required';
        }

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'ApplicationstartedRequest validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}