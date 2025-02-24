<?php

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Models\EventBase;
use Synerise\Api\V4\Models\ItemSearchClickEventData;

class ItemSearchClickValidator implements Validator
{
    /**
     * Validate ItemSearchClickEventData.
     * @param ItemSearchClickEventData $event
     * @inheritDoc
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array
    {
        $invalid = EventBaseValidator::validate($event, false);
        $params = $event->getParams();
        if (empty($params)) {
            $invalid[] = 'Params are required';
        }
        if (empty($params->getCorrelationId())) {
            $invalid[] = 'Correlation id is required';
        }
        if (empty($params->getItem())) {
            $invalid[] = 'Item is required';
        }
        if (empty($params->getPosition())) {
            $invalid[] = 'Position is required';
        }
        if (empty($params->getSearchType())) {
            $invalid[] = 'Search type is required';
        }

        if ($throwOnError && !empty($invalid)) {
            throw new InvalidArgumentException(
                'ItemSearchClickEventData validation failed: ' . implode(', ', $invalid)
            );
        }

        return $invalid;
    }
}