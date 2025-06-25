<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Models\ApplicationStartedEvent;
use Synerise\Api\V4\Models\ApplicationStartedEventParams;
use Synerise\Api\V4\Models\Client;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\ApplicationStartedValidator;

/**
 * @extends AbstractBaseBuilder<ApplicationStartedEvent>
 */
class ApplicationStartedBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'client.applicationStarted';

    /**
     * Default event label
     */
    public const LABEL = 'Application started';

    /**
     * ApplicationstartedRequest being built
     * @var ApplicationStartedEvent
     */
    public ApplicationStartedEvent $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new ApplicationStartedEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new ApplicationStartedEventParams());
    }

    /**
     * @inheritDoc
     * @return ApplicationStartedValidator
     */
    public static function getValidator(): ApplicationStartedValidator
    {
        return new ApplicationStartedValidator();
    }

    /**
     * @param string $applicationName
     * @return $this
     */
    public function setApplicationName(string $applicationName): self
    {
        $this->getParams()->setApplicationName($applicationName);
        return $this;
    }

    /**
     * Set version
     * @param string $version
     * @return self
     */
    public function setVersion(string $version): self
    {
        $this->getParams()->setVersion($version);
        return $this;
    }

    /**
     * @inheritDoc
     * @return ApplicationStartedEvent
     */
    protected function getRequestBody(): ApplicationStartedEvent
    {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return ApplicationStartedEventParams
     */
    protected function getParams(): ApplicationStartedEventParams
    {
        return $this->getRequestBody()->getParams();
    }
}