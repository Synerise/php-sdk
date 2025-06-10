<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\SharedEvent;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\SharedValidator;

class SharedBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'client.shared';

    /**
     * Default event labels
     */
    public const LABEL = 'Content shared';

    /**
     * SharedEvent being built
     * @var SharedEvent
     */
    protected SharedEvent $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new SharedEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return SharedEvent
     */
    public function build(bool $validate = true): SharedEvent
    {
        parent::setBaseProperties();

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return SharedValidator
     */
    public static function getValidator(): SharedValidator
    {
        return new SharedValidator();
    }

    /**
     * @inheritDoc
     * @return SharedEvent
     */
    protected function getRequestBody(): SharedEvent
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