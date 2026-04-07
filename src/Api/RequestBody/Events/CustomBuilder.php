<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\CustomEvent;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Sdk\Api\Validation\Events\CustomValidator;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;

/**
 * @extends AbstractBaseBuilder<CustomEvent>
 */
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
     * @return $this
     */
    public function setAction(string $action): static
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @inheritDoc
     * @return CustomEvent
     */
    protected function getRequestBody(): CustomEvent
    {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return DefaultParamSource
     */
    protected function getParams(): DefaultParamSource
    {
        $params = $this->getRequestBody()->getParams();
        if (!$params) {
            $params = new DefaultParamSource();
            $this->getRequestBody()->setParams($params);
        }
        return $params;
    }
}
