<?php

namespace Synerise\Sdk\Api\RequestBody\Events\Push;

use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\PushViewedEvent;
use Synerise\Sdk\Api\RequestBody\Events\AbstractBaseBuilder;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\Push\ViewedValidator;

class ViewedBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'push.view';

    /**
     * Default event labels
     */
    public const LABEL = 'Push notification viewed';

    /**
     * PushViewedEvent being built
     * @var PushViewedEvent
     */
    protected PushViewedEvent $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new PushViewedEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return PushViewedEvent
     */
    public function build(bool $validate = true): PushViewedEvent
    {
        parent::setBaseProperties();

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return ViewedValidator
     */
    public static function getValidator(): ViewedValidator
    {
        return new ViewedValidator();
    }

    /**
     * @inheritDoc
     * @return PushViewedEvent
     */
    protected function getRequestBody(): PushViewedEvent
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