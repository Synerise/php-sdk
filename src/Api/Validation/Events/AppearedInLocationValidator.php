<?php

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Events\AppearedInLocation\AppearedInLocationPostRequestBody;
use Synerise\Api\V4\Models\EventBase;

class AppearedInLocationValidator implements Validator
{
    /**
     * Validate ClientCartEventRequest.
     * @param AppearedInLocationPostRequestBody $event
     * @inheritDoc
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array
    {
        $invalid = EventBaseValidator::validate($event, false);
        $params = $event->getParams();
        if (empty($params)) {
            $invalid[] = 'Params are required';
        } else {
            if (empty($params->getLat())) {
                $invalid[] = 'Lat is required';
            }
            if (empty($params->getLon())) {
                $invalid[] = 'Lon is required';
            }
        }

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'AppearedInLocationPostRequestBody validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}