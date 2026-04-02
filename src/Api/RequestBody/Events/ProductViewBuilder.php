<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\ProductViewEvent;
use Synerise\Api\V4\Models\ProductViewEventParams;
use Synerise\Sdk\Api\Validation\Events\ProductViewValidator;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;

/**
 * @extends AbstractBaseBuilder<ProductViewEvent>
 */
class ProductViewBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'product.view';

    /**
     * Default event label
     */
    public const LABEL = 'Item viewed';

    /**s
     * ProductViewEvent being built
     * @var ProductViewEvent
     */
    protected ProductViewEvent $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new ProductViewEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new ProductViewEventParams());
    }

    /**
     * @inheritDoc
     * @return ProductViewValidator
     */
    public static function getValidator(): ProductViewValidator
    {
        return new ProductViewValidator();
    }

    /**
     * Set name.
     * Optional.
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->getParams()->setName($name);
        return $this;
    }

    /**
     * Set category.
     * Optional.
     * @param string $category
     * @return $this
     */
    public function setCategory(string $category): self
    {
        $this->getParams()->setCategory($category);
        return $this;
    }

    /**
     * Set campaign hash.
     * Optional.
     * @param string $campaignHash
     * @return $this
     */
    public function setCampaignHash(string $campaignHash): self
    {
        $this->getParams()->setCampaignHash($campaignHash);
        return $this;
    }

    /**
     * Set FromRecommendation flag.
     * Optional.
     * @param bool $fromRecommendation
     * @return $this
     */
    public function setFromRecommendation(bool $fromRecommendation): self
    {
        $this->getParams()->setFromRecommendation($fromRecommendation);
        return $this;
    }

    /**
     * Set product id.
     * Optional.
     * @param string $productId
     * @return $this
     */
    public function setProductId(string $productId): self
    {
        $this->getParams()->setProductId($productId);
        return $this;
    }

    /**
     * Set url.
     * Optional.
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): self
    {
        $this->getParams()->setUrl($url);
        return $this;
    }

    /**
     * @inheritDoc
     * @return ProductViewEvent
     */
    protected function getRequestBody(): ProductViewEvent
    {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return ProductViewEventParams
     */
    protected function getParams(): ProductViewEventParams
    {
        return $this->getRequestBody()->getParams();
    }
}
