<?php

namespace Synerise\Sdk\Api\RequestBody\Events\Push;

use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\PushClickedEvent;
use Synerise\Sdk\Api\RequestBody\Events\AbstractBaseBuilder;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\Push\ClickedValidator;

class ClickedBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'push.click';

    /**
     * Default event labels
     */
    public const LABEL = 'Push notification clicked';

    /**
     * PushClickedEvent being built
     * @var PushClickedEvent
     */
    protected PushClickedEvent $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new PushClickedEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return PushClickedEvent
     */
    public function build(bool $validate = true): PushClickedEvent
    {
        parent::setBaseProperties();

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return ClickedValidator
     */
    public static function getValidator(): ClickedValidator
    {
        return new ClickedValidator();
    }

    /**
     * @inheritDoc
     * @return PushClickedEvent
     */
    protected function getRequestBody(): PushClickedEvent
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