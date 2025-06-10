<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\CustomEvent;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\AddedReviewValidator;

class AddedReviewBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'product.addReview';

    /**
     * Default event label
     */
    public const LABEL = 'Profile reviewed product';

    /**
     *  CustomEvent being built
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
     * @return CustomEvent
     */
    public function build(bool $validate = true): CustomEvent
    {
        parent::setBaseProperties();

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return AddedReviewValidator
     */
    public static function getValidator(): AddedReviewValidator
    {
        return new AddedReviewValidator();
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
     * Set sku.
     * Optional.
     * @param string $sku
     * @return $this
     */
    public function setRating(string $sku): self
    {
        $this->additionalData['rating'] = $sku;
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
        return $this->getRequestBody()->getParams();
    }
}