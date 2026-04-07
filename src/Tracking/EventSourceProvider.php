<?php

declare(strict_types=1);

namespace Synerise\Sdk\Tracking;

use RuntimeException;
use Synerise\Api\V4\Models\EventSource;

interface EventSourceProvider
{
    /**
     * Determine and provide event source
     * @throws RuntimeException
     * @return EventSource
     */
    public function getEventSource(): EventSource;
}
