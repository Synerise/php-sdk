<?php

namespace Synerise\Sdk\Api\Validation\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Models\EventBase;

interface Validator
{
    /**
     * Ensures required properties are set and all properties are in valid format.
     * @param EventBase $event
     * @param bool $throwOnError
     * @return array
     * @throws InvalidArgumentException
     */
    public static function validate(EventBase $event, bool $throwOnError = true): array;
}