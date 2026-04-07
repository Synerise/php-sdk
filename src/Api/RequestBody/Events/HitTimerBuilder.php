<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\HitTimerEvent;
use Synerise\Sdk\Api\Validation\Events\HitTimerValidator;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;

/**
 * @extends AbstractBaseBuilder<HitTimerEvent>
 */
class HitTimerBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'client.hitTimer';

    /**
     * Default event labels
     */
    public const LABEL = 'Timer hit';

    /**
     * HitTimerEvent being built
     * @var HitTimerEvent
     */
    protected HitTimerEvent $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new HitTimerEvent();
        $this->requestBody->setClient($client);
    }

    /**
     * @inheritDoc
     * @return HitTimerValidator
     */
    public static function getValidator(): HitTimerValidator
    {
        return new HitTimerValidator();
    }

    /**
     * @inheritDoc
     * @return HitTimerEvent
     */
    protected function getRequestBody(): HitTimerEvent
    {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return DefaultParamSource
     */
    protected function getParams(): DefaultParamSource
    {
        $params = $this->getRequestBody()->getParams();
        if (!$params) {
            $params = new DefaultParamSource();
            $this->getRequestBody()->setParams($params);
        }
        return $params;
    }
}
