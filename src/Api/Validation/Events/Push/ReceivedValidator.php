<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\Validation\Events\Push;

use InvalidArgumentException;
use Synerise\Api\V4\Models\EventBase;
use Synerise\Api\V4\Models\EventSource;
use Synerise\Api\V4\Models\PushReceivedEvent;
use Synerise\Sdk\Api\Validation\Events\EventBaseValidator;
use Synerise\Sdk\Api\Validation\Events\Validator;

class ReceivedValidator implements Validator
{
    /**
     * Validate PushReceivedEvent.
     * @param PushReceivedEvent $event
     * @inheritDoc
     * @return array<int, string>
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array
    {
        $invalid = EventBaseValidator::validate($event, false);
        $params = $event->getParams();
        if (empty($params)) {
            $invalid[] = 'Params are required';
        } else {
            $additionalData = $params->getAdditionalData();
            if (!isset($additionalData['source']) || !($additionalData['source'] instanceof EventSource)) {
                $invalid[] = 'Event source is required';
            }
        }

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'PushReceivedEvent validation failed: ' . implode(', ', $invalid),
            );
        }

        return $invalid;
    }
}
