<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\CustomEvent;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\CustomValidator;

class CustomBuilder extends AbstractBaseBuilder
{
    protected CustomEvent $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();

        $this->requestBody = new CustomEvent();
        $this->requestBody->setClient($client);
    }

    /**
     * @inheritDoc
     * @return CustomValidator
     */
    public static function getValidator(): CustomValidator
    {
        return new CustomValidator();
    }

    /**
     * Set action.
     * Required. Suggested format: <string>.<string>
     * @param string $action
     * @return self
     */
    public function setAction(string $action): self
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @inheritDoc
     * @return CustomEvent
     */
    protected function getRequestBody(): CustomEvent {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return DefaultParamSource
     */
    protected function getParams(): DefaultParamSource
    {
        if (!$this->getRequestBody()->getParams()) {
            $this->getRequestBody()->setParams(new DefaultParamSource());
        }
        return $this->getRequestBody()->getParams();
    }
}