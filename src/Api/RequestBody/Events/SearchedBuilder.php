<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\RequestBody\Events;

use RuntimeException;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\SearchedEvent;
use Synerise\Sdk\Api\Validation\Events\SearchedValidator;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;

/**
 * @extends AbstractBaseBuilder<SearchedEvent>
 */
class SearchedBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'client.search';

    /**
     * Default event label
     */
    public const LABEL = 'Search requested';

    /**
     * SearchedEvent being built
     * @var SearchedEvent
     */
    protected SearchedEvent $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new SearchedEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return SearchedValidator
     */
    public static function getValidator(): SearchedValidator
    {
        return new SearchedValidator();
    }

    /**
     * @inheritDoc
     * @return SearchedEvent
     */
    protected function getRequestBody(): SearchedEvent
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
