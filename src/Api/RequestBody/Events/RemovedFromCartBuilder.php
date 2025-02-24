<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Models\Client;
use Synerise\Sdk\Tracking\EventSourceProvider;

class RemovedFromCartBuilder extends AbstractCartBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'product.removeFromCart';

    /**
     * Default event label
     */
    public const LABEL = 'Item removed from cart';

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        parent::__construct($client, $sourceProvider);

        $this->action = self::ACTION;
        $this->label = self::LABEL;
    }
}