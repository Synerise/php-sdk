<?php

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Events\AddedToFavorites\AddedToFavoritesPostRequestBody;
use Synerise\Api\V4\Models\EventBase;

class AddedToFavoritesValidator implements Validator
{
    /**
     * Validate AddedToFavoritesPostRequestBody.
     * @param AddedToFavoritesPostRequestBody $event
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
                'AddedToFavoritesPostRequestBody validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}