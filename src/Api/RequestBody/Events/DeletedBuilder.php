<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\RequestBody\Events;

use RuntimeException;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\CustomEvent;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Sdk\Api\Validation\Events\DeletedValidator;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;

/**
 * @extends AbstractBaseBuilder<CustomEvent>
 */
class DeletedBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'client.deleteAccount';

    /**
     * Default event label
     */
    public const LABEL = 'Profile account deleted';

    /**
     * CustomEvent being built
     * @var CustomEvent
     */
    protected CustomEvent $requestBody;

    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new CustomEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return DeletedValidator
     */
    public static function getValidator(): DeletedValidator
    {
        return new DeletedValidator();
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
        return $this->getRequestBody()->getParams() ?? throw new RuntimeException('Params not initialized');
    }
}
