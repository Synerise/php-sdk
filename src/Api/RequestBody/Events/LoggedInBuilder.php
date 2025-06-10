<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\LoggedInEvent;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\LoggedInValidator;

class LoggedInBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'client.login';

    /**
     * Default event label
     */
    public const LABEL = 'Profile logged in';

    /**
     *  LoggedInEvent being built
     * @var LoggedInEvent
     */
    protected LoggedInEvent $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new LoggedInEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return LoggedInEvent
     */
    public function build(bool $validate = true): LoggedInEvent
    {
        parent::setBaseProperties();

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return LoggedInValidator
     */
    public static function getValidator(): LoggedInValidator
    {
        return new LoggedInValidator();
    }

    /**
     * @inheritDoc
     * @return LoggedInEvent
     */
    protected function getRequestBody(): LoggedInEvent
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