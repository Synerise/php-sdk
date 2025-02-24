<?php

namespace Synerise\Sdk\Tracking;

use RuntimeException;
use Synerise\Api\V4\Models\EventSource;

interface EventSourceProvider
{
    /**
     * Determine and provide event source
     * @return EventSource
     * @throws RuntimeException
     */
    public function getEventSource(): EventSource;
}