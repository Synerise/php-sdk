<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Models\CartEvent;
use Synerise\Api\V4\Models\CartEventParams;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DiscountedUnitPrice;
use Synerise\Api\V4\Models\FinalUnitPrice;
use Synerise\Api\V4\Models\RegularUnitPrice;
use Synerise\Sdk\Api\Validation\Events\CartEventValidator;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;

/**
 * @extends AbstractBaseBuilder<CartEvent>
 */
class AbstractCartBuilder extends AbstractBaseBuilder
{
    /**
     * CartEvent being built
     * @var CartEvent
     */
    protected CartEvent $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();

        $this->requestBody = new CartEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new CartEventParams());
    }

    /**
     * @inheritDoc
     * @return CartEventValidator
     */
    public static function getValidator(): CartEventValidator
    {
        return new CartEventValidator();
    }

    /**
     * Set final unit price.
     * Required.
     * @param FinalUnitPrice|null $finalUnitPrice
     * @return $this
     */
    public function setFinalUnitPrice(?FinalUnitPrice $finalUnitPrice): self
    {
        $this->getParams()->setFinalUnitPrice($finalUnitPrice);
        return $this;
    }

    /**
     * Set sku.
     * Required.
     * @param string|null $sku
     * @return $this
     */
    public function setSku(?string $sku): self
    {
        $this->getParams()->setSku($sku);
        return $this;
    }

    /**
     * Set quantity.
     * Required.
     * @param float|null $quantity
     * @return $this
     */
    public function setQuantity(?float $quantity): self
    {
        $this->getParams()->setQuantity($quantity);
        return $this;
    }

    /**
     * Set name.
     * Optional.
     * @param string|null $name
     * @return $this
     */
    public function setName(?string $name): self
    {
        $this->getParams()->setName($name);
        return $this;
    }

    /**
     * Set offline.
     * Optional.
     * @param bool|null $offline
     * @return $this
     */
    public function setOffline(?bool $offline): self
    {
        $this->getParams()->setOffline($offline);
        return $this;
    }

    /**
     * Set producer.
     * Optional.
     * @param string|null $producer
     * @return $this
     */
    public function setProducer(?string $producer): self
    {
        $this->getParams()->setProducer($producer);
        return $this;
    }

    /**
     * Set item url address.
     * Optional.
     * @param string|null $itemUrlAddress
     * @return $this
     */
    public function setItemUrlAddress(?string $itemUrlAddress): self
    {
        $this->getParams()->setItemUrlAddress($itemUrlAddress);
        return $this;
    }

    /**
     * Set category.
     * Optional.
     * @param string|null $category
     * @return $this
     */
    public function setCategory(?string $category): self
    {
        $this->getParams()->setCategory($category);
        return $this;
    }

    /**
     * Set additional categories.
     * Optional.
     * @param string[]|null $categories
     * @return $this
     */
    public function setCategories(?array $categories): self
    {
        $this->getParams()->setCategories($categories);
        return $this;
    }

    /**
     * Set discounted unit price.
     * Optional.
     * @param DiscountedUnitPrice|null $discountedUnitPrice
     * @return $this
     */
    public function setDiscountedUnitPrice(?DiscountedUnitPrice $discountedUnitPrice): self
    {
        $this->getParams()->setDiscountedUnitPrice($discountedUnitPrice);
        return $this;
    }

    /**
     * Set regularUnitPrice.
     * Optional.
     * @param RegularUnitPrice|null $regularUnitPrice
     * @return $this
     */
    public function setRegularUnitPrice(?RegularUnitPrice $regularUnitPrice): self
    {
        $this->getParams()->setRegularUnitPrice($regularUnitPrice);
        return $this;
    }

    /**
     * Set snrsParams. Params set by url query.
     * Optional.
     * @param array<string, mixed>|null $params
     * @return $this
     */
    public function setSnrsParams(?array $params): self
    {
        if ($params) {
            $this->additionalData['snrsParams'] = $params;
        }
        return $this;
    }

    /**
     * @inheritDoc
     * @return CartEvent
     */
    protected function getRequestBody(): CartEvent
    {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return CartEventParams
     */
    protected function getParams(): CartEventParams
    {
        return $this->requestBody->getParams();
    }
}
