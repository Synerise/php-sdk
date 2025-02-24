<?php

namespace Synerise\Sdk\Api\Validation\Events\Push;

use InvalidArgumentException;
use Synerise\Api\V4\Events\Push\Viewed\ViewedPostRequestBody;
use Synerise\Api\V4\Models\EventBase;
use Synerise\Api\V4\Models\EventSource;
use Synerise\Sdk\Api\Validation\Events\EventBaseValidator;
use Synerise\Sdk\Api\Validation\Events\Validator;

class ViewedValidator implements Validator
{
    /**
     * Validate ViewedPostRequestBody.
     * @param ViewedPostRequestBody $event
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
                'ViewedPostRequestBody validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}