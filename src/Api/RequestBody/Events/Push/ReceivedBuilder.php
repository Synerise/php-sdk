<?php

namespace Synerise\Sdk\Api\RequestBody\Events\Push;

use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\PushReceivedEvent;
use Synerise\Sdk\Api\RequestBody\Events\AbstractBaseBuilder;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\Push\ReceivedValidator;

/**
 * @extends AbstractBaseBuilder<PushReceivedEvent>
 */
class ReceivedBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'push.receiveInBackground';

    /**
     * Default event labels
     */
    public const LABEL = 'Push notification received';

    /**
     * SearchedPostRequestBody being built
     * @var PushReceivedEvent
     */
    protected PushReceivedEvent $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new PushReceivedEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return ReceivedValidator
     */
    public static function getValidator(): ReceivedValidator
    {
        return new ReceivedValidator();
    }

    /**
     * @inheritDoc
     * @return PushReceivedEvent
     */
    protected function getRequestBody(): PushReceivedEvent
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