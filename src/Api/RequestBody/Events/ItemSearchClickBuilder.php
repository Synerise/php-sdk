<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\ItemSearchClickEventData;
use Synerise\Api\V4\Models\ItemSearchClickEventData_params;
use Synerise\Api\V4\Models\SearchType;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\ItemSearchClickValidator;

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
        $this->requestBody->setParams(new ItemSearchClickEventData_params());
    }

    /**
     * @inheritDoc
     * @return ItemSearchClickEventData
     */
    public function build(bool $validate = true): ItemSearchClickEventData
    {
        parent::setBaseProperties();

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
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
     * @return self
     */
    public function setCorrelationId(string $correlationId): self
    {
        $this->getParams()->setCorrelationId($correlationId);
        return $this;
    }

    /**
     * Set item
     * Required.
     * @param string $item
     * @return self
     */
    public function setItem(string $item): self
    {
        $this->getParams()->setItem($item);
        return $this;
    }

    /**
     * Set position
     * Required.
     * @param int $position
     * @return self
     */
    public function setPosition(int $position): self
    {
        $this->getParams()->setPosition($position);
        return $this;
    }

    /**
     * Set search type
     * Required.
     * @param SearchType $searchType
     * @return self
     */
    public function setSearchType(SearchType $searchType): self
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
     * @return ItemSearchClickEventData_params
     */
    protected function getParams(): ItemSearchClickEventData_params
    {
        return $this->getRequestBody()->getParams();
    }
}