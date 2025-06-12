<?php

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Models\AddedToFavoritesEvent;
use Synerise\Api\V4\Models\EventBase;

class AddedToFavoritesValidator implements Validator
{
    /**
     * Validate AddedToFavoritesEvent.
     * @param AddedToFavoritesEvent $event
     * @inheritDoc
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array
    {
        $invalid = EventBaseValidator::validate($event, false);
        $params = $event->getParams();
        if (empty($params)) {
            $invalid[] = 'Params are required';
        }

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'AddedToFavoritesEvent validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}