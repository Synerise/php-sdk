<?php

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Models\CustomEvent;
use Synerise\Api\V4\Models\EventBase;

class RemovedFromFavoritesValidator implements Validator
{
    /**
     * Validate product.removeFromFavorites CustomEvent.
     * @param CustomEvent $event
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
                'product.removeFromFavorites CustomEvent validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}