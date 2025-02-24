<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Models\ApplicationstartedRequest;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\ClientApplicationStartedEventParams;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\ApplicationStartedValidator;

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
     * @var ApplicationstartedRequest
     */
    public ApplicationstartedRequest $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new ApplicationstartedRequest();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new ClientApplicationStartedEventParams());
    }

    /**
     * @inheritDoc
     * @return ApplicationstartedRequest
     */
    public function build(bool $validate = true): ApplicationstartedRequest
    {
        parent::setBaseProperties();

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
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
     * @return ApplicationstartedRequest
     */
    protected function getRequestBody(): ApplicationstartedRequest
    {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return ClientApplicationStartedEventParams
     */
    protected function getParams(): ClientApplicationStartedEventParams
    {
        return $this->getRequestBody()->getParams();
    }
}