<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Events\Custom\CustomPostRequestBody;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\DiscountedUnitPrice;
use Synerise\Api\V4\Models\FinalUnitPrice;
use Synerise\Api\V4\Models\RegularUnitPrice;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\CartStatusValidator;

class RemovedFromFavoritesBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'product.removeFromFavorites';

    /**
     * Default event label
     */
    public const LABEL = 'Product removed from favourites';

    /**
     * CustomPostRequestBody being built
     * @var CustomPostRequestBody
     */
    protected CustomPostRequestBody $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new CustomPostRequestBody();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return CustomPostRequestBody
     */
    public function build(bool $validate = true): CustomPostRequestBody
    {
        parent::setBaseProperties();
        $this->requestBody->setAction($this->action);

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return CartStatusValidator
     */
    public static function getValidator(): CartStatusValidator
    {
        return new CartStatusValidator();
    }

    /**
     * Set final unit price.
     * Optional.
     * @param FinalUnitPrice $finalUnitPrice
     * @return $this
     */
    public function setFinalUnitPrice(FinalUnitPrice $finalUnitPrice): self
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
    public function setSku(string $sku): self
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
    public function setName(string $name): self
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
    public function setProducer(string $producer): self
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
    public function setItemUrlAddress(string $itemUrlAddress): self
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
    public function setCategory(string $category): self
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
    public function setCategories(array $categories): self
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
    public function setDiscountedUnitPrice(DiscountedUnitPrice $discountedUnitPrice): self
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
    public function setRegularUnitPrice(RegularUnitPrice $regularUnitPrice): self
    {
        $this->additionalData['regularUnitPrice'] = $regularUnitPrice;
        return $this;
    }

    /**
     * @inheritDoc
     * @return CustomPostRequestBody
     */
    protected function getRequestBody(): CustomPostRequestBody
    {
        return $this->requestBody;
    }

    /**s
     * @inheritDoc
     * @return DefaultParamSource
     */
    protected function getParams(): DefaultParamSource
    {
        return $this->requestBody->getParams();
    }
}