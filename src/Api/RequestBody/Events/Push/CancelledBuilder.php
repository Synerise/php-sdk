<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\RequestBody\Events\Push;

use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\PushCancelledEvent;
use Synerise\Sdk\Api\RequestBody\Events\AbstractBaseBuilder;
use Synerise\Sdk\Api\Validation\Events\Push\CancelledValidator;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;

/**
 * @extends AbstractBaseBuilder<PushCancelledEvent>
 */
class CancelledBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'push.cancel';

    /**
     * Default event labels
     */
    public const LABEL = 'Push notifications cancelled';

    /**
     * PushCancelledEvent being built
     * @var PushCancelledEvent
     */
    protected PushCancelledEvent $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new PushCancelledEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return CancelledValidator
     */
    public static function getValidator(): CancelledValidator
    {
        return new CancelledValidator();
    }

    /**
     * @inheritDoc
     * @return PushCancelledEvent
     */
    protected function getRequestBody(): PushCancelledEvent
    {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return DefaultParamSource
     */
    protected function getParams(): DefaultParamSource
    {
        return $this->getRequestBody()->getParams();
    }
}
