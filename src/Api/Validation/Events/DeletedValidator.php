<?php

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Events\Custom\CustomPostRequestBody;
use Synerise\Api\V4\Models\EventBase;

class DeletedValidator implements Validator
{
    /**
     * Validate client.deleteAccount CustomPostRequestBody.
     * @param CustomPostRequestBody $event
     * @inheritDoc
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array
    {
        $invalid = EventBaseValidator::validate($event, false);
        $params = $event->getParams();
        if (empty($params)) {
            $invalid[] = 'Params are required';
        }
        if (empty($event->getAction())) {
            $invalid[] = 'Action is required';
        }

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'client.deleteAccount CustomPostRequestBody validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}