<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\LoggedOutEvent;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\LoggedOutValidator;

/**
 * @extends AbstractBaseBuilder<LoggedOutEvent>
 */
class LoggedOutBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'client.logout';

    /**
     * Default event label
     */
    public const LABEL = 'Profile logged out';

    /**
     *  LoggedOutEvent being built
     * @var LoggedOutEvent
     */
    protected LoggedOutEvent $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new LoggedOutEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return LoggedOutValidator
     */
    public static function getValidator(): LoggedOutValidator
    {
        return new LoggedOutValidator();
    }

    /**
     * @inheritDoc
     * @return LoggedOutEvent
     */
    protected function getRequestBody(): LoggedOutEvent
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