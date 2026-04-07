<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\RequestBody\Events;

use RuntimeException;
use Synerise\Api\V4\Models\AddedToFavoritesEvent;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\DiscountedUnitPrice;
use Synerise\Api\V4\Models\FinalUnitPrice;
use Synerise\Api\V4\Models\RegularUnitPrice;
use Synerise\Sdk\Api\Validation\Events\AddedToFavoritesValidator;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;

/**
 * @extends AbstractBaseBuilder<AddedToFavoritesEvent>
 */
class AddedToFavoritesBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'product.addToFavorite';

    /**
     * Default event label
     */
    public const LABEL = 'Product added to favorites';

    /**
     *  AddedToFavoritesEvent being built
     * @var AddedToFavoritesEvent
     */
    protected AddedToFavoritesEvent $requestBody;

    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new AddedToFavoritesEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return AddedToFavoritesValidator
     */
    public static function getValidator(): AddedToFavoritesValidator
    {
        return new AddedToFavoritesValidator();
    }

    /**
     * Set final unit price.
     * Optional.
     * @param FinalUnitPrice $finalUnitPrice
     * @return $this
     */
    public function setFinalUnitPrice(FinalUnitPrice $finalUnitPrice): static
    {
        $this->additionalData['finalUnitPrice'] = $finalUnitPrice;
        return $this;
    }

    /**
     * Set sku.
     * Optional.
     * @param string $sku
     * @return $this
     */
    public function setSku(string $sku): static
    {
        $this->additionalData['sku'] = $sku;
        return $this;
    }

    /**
     * Set name.
     * Optional.
     * @param string $name
     * @return $this
     */
    public function setName(string $name): static
    {
        $this->additionalData['name'] = $name;
        return $this;
    }

    /**
     * Set producer.
     * Optional.
     * @param string $producer
     * @return $this
     */
    public function setProducer(string $producer): static
    {
        $this->additionalData['producer'] = $producer;
        return $this;
    }

    /**
     * Set item url address.
     * Optional.
     * @param string $itemUrlAddress
     * @return $this
     */
    public function setItemUrlAddress(string $itemUrlAddress): static
    {
        $this->additionalData['itemUrlAddress'] = $itemUrlAddress;
        return $this;
    }

    /**
     * Set category.
     * Optional.
     * @param string $category
     * @return $this
     */
    public function setCategory(string $category): static
    {
        $this->additionalData['category'] = $category;
        return $this;
    }

    /**
     * Set additional categories.
     * Optional.
     * @param string[] $categories
     * @return $this
     */
    public function setCategories(array $categories): static
    {
        $this->additionalData['categories'] = $categories;
        return $this;
    }

    /**
     * Set discounted unit price.
     * Optional.
     * @param DiscountedUnitPrice $discountedUnitPrice
     * @return $this
     */
    public function setDiscountedUnitPrice(DiscountedUnitPrice $discountedUnitPrice): static
    {
        $this->additionalData['discountedUnitPrice'] = $discountedUnitPrice;
        return $this;
    }

    /**
     * Set regularUnitPrice.
     * Optional.
     * @param RegularUnitPrice $regularUnitPrice
     * @return $this
     */
    public function setRegularUnitPrice(RegularUnitPrice $regularUnitPrice): static
    {
        $this->additionalData['regularUnitPrice'] = $regularUnitPrice;
        return $this;
    }

    /**
     * @inheritDoc
     * @return AddedToFavoritesEvent
     */
    protected function getRequestBody(): AddedToFavoritesEvent
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
