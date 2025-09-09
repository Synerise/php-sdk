<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\RegisteredEvent;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\RegisteredValidator;

/**
 * @extends AbstractBaseBuilder<RegisteredEvent>
 */
class RegisteredBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'client.register';

    /**
     * Default event label
     */
    public const LABEL = 'Profile account registered';

    /**
     *  RegisteredEvent being built
     * @var RegisteredEvent
     */
    protected RegisteredEvent $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new RegisteredEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return RegisteredValidator
     */
    public static function getValidator(): RegisteredValidator
    {
        return new RegisteredValidator();
    }

    /**
     * @inheritDoc
     * @return RegisteredEvent
     */
    protected function getRequestBody(): RegisteredEvent
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