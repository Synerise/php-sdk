<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\VisitedScreenEvent;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\VisitedScreenValidator;

/**
 * @extends AbstractBaseBuilder<VisitedScreenEvent>
 */
class VisitedScreenBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'screen.view';

    /**
     * Default event labels
     */
    public const LABEL = 'Mobile app screen visited';

    /**
     * VisitedScreenEvent being built
     * @var VisitedScreenEvent
     */
    protected VisitedScreenEvent $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new VisitedScreenEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return VisitedScreenValidator
     */
    public static function getValidator(): VisitedScreenValidator
    {
        return new VisitedScreenValidator();
    }

    /**
     * @inheritDoc
     * @return VisitedScreenEvent
     */
    protected function getRequestBody(): VisitedScreenEvent
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