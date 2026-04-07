<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\RequestBody\Events;

use RuntimeException;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\ItemSearchClickEventData;
use Synerise\Api\V4\Models\ItemSearchClickEventDataParams;
use Synerise\Api\V4\Models\SearchType;
use Synerise\Sdk\Api\Validation\Events\ItemSearchClickValidator;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;

/**
 * @extends AbstractBaseBuilder<ItemSearchClickEventData>
 */
class ItemSearchClickBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'item.search.click';

    /**
     * Default event labels
     */
    public const LABEL = 'Search result clicked';

    /**
     * ItemSearchClickEventData being built
     * @var ItemSearchClickEventData
     */
    protected ItemSearchClickEventData $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new ItemSearchClickEventData();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new ItemSearchClickEventDataParams());
    }

    /**
     * @inheritDoc
     * @return ItemSearchClickValidator
     */
    public static function getValidator(): ItemSearchClickValidator
    {
        return new ItemSearchClickValidator();
    }

    /**
     * Set correlation id
     * Required.
     * @param string $correlationId
     * @return $this
     */
    public function setCorrelationId(string $correlationId): static
    {
        $this->getParams()->setCorrelationId($correlationId);
        return $this;
    }

    /**
     * Set item
     * Required.
     * @param string $item
     * @return $this
     */
    public function setItem(string $item): static
    {
        $this->getParams()->setItem($item);
        return $this;
    }

    /**
     * Set position
     * Required.
     * @param int $position
     * @return $this
     */
    public function setPosition(int $position): static
    {
        $this->getParams()->setPosition($position);
        return $this;
    }

    /**
     * Set search type
     * Required.
     * @param SearchType $searchType
     * @return $this
     */
    public function setSearchType(SearchType $searchType): static
    {
        $this->getParams()->setSearchType($searchType);
        return $this;
    }

    /**
     * @inheritDoc
     * @return ItemSearchClickEventData
     */
    protected function getRequestBody(): ItemSearchClickEventData
    {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return ItemSearchClickEventDataParams
     */
    protected function getParams(): ItemSearchClickEventDataParams
    {
        return $this->getRequestBody()->getParams() ?? throw new RuntimeException('Params not initialized');
    }
}
