<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\RequestBody\Events;

use RuntimeException;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\CustomEvent;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Sdk\Api\Validation\Events\AddedReviewValidator;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;

/**
 * @extends AbstractBaseBuilder<CustomEvent>
 */
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
     * @return AddedReviewValidator
     */
    public static function getValidator(): AddedReviewValidator
    {
        return new AddedReviewValidator();
    }

    /**
     * Set sku.
     * Optional.
     * @param string|null $sku
     * @return $this
     */
    public function setSku(?string $sku): static
    {
        if ($sku !== null) {
            $this->additionalData['sku'] = $sku;
        }
        return $this;
    }

    /**
     * Set rating.
     * Optional.
     * @param int|string|null $rating
     * @return $this
     */
    public function setRating($rating): static
    {
        if ($rating !== null) {
            $this->additionalData['rating'] = $rating;
        }
        return $this;
    }

    /**
     * Set an author name.
     * Optional.
     * @param string|null $name
     * @return $this
     */
    public function setName(?string $name): static
    {
        if ($name !== null) {
            $this->additionalData['name'] = $name;
        }
        return $this;
    }

    /**
     * Set product url address.
     * Optional.
     * @param string|null $url
     * @return $this
     */
    public function setUrl(?string $url): static
    {
        if ($url !== null) {
            $this->additionalData['url'] = $url;
        }
        return $this;
    }

    /**
     * Set a product category.
     * Optional.
     * @param string|null $category
     * @return $this
     */
    public function setCategory(?string $category): static
    {
        if ($category !== null) {
            $this->additionalData['category'] = $category;
        }
        return $this;
    }

    /**
     * Set additional categories.
     * Optional.
     * @param string[]|null $categories
     * @return $this
     */
    public function setCategories(?array $categories): static
    {
        if ($categories !== null) {
            $this->additionalData['categories'] = $categories;
        }
        return $this;
    }

    /**
     * Set a review title.
     * Optional.
     * @param string|null $title
     * @return $this
     */
    public function setTitle(?string $title): static
    {
        if ($title !== null) {
            $this->additionalData['title'] = $title;
        }
        return $this;
    }

    /**
     * Set review comment.
     * Optional.
     * @param string|null $comment
     * @return $this
     */
    public function setComment(?string $comment): static
    {
        if ($comment !== null) {
            $this->additionalData['comment'] = $comment;
        }
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
        return $this->getRequestBody()->getParams() ?? throw new RuntimeException('Params not initialized');
    }
}
