<?php

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Events\AssignedToCompany\AssignedToCompanyPostRequestBody;
use Synerise\Api\V4\Models\EventBase;

class AssignedToCompanyValidator implements Validator
{
    /**
     * Validate AssignedToCompanyPostRequestBody.
     * @param AssignedToCompanyPostRequestBody $event
     * @inheritDoc
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array
    {
        $invalid = EventBaseValidator::validate($event, false);
        $params = $event->getParams();
        if (empty($params)) {
            $invalid[] = 'Params are required';
        }
        if (empty($params->getCompanyId())) {
            $invalid[] = 'Company id is required';
        }

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'AssignedToCompanyPostRequestBody validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}