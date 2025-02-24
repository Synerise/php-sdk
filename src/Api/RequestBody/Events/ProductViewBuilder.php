<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Events\ProductView\ProductViewPostRequestBody;
use Synerise\Api\V4\Events\ProductView\ProductViewPostRequestBody_params;
use Synerise\Api\V4\Models\Client;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\ProductViewValidator;

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
     * ProductViewPostRequestBody being built
     * @var ProductViewPostRequestBody
     */
    protected ProductViewPostRequestBody $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new ProductViewPostRequestBody();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new ProductViewPostRequestBody_params());
    }

    /**
     * @inheritDoc
     * @return ProductViewPostRequestBody
     */
    public function build(bool $validate = true): ProductViewPostRequestBody
    {
        parent::setBaseProperties();

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
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
     * @return ProductViewPostRequestBody
     */
    protected function getRequestBody(): ProductViewPostRequestBody
    {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return ProductViewPostRequestBody_params
     */
    protected function getParams(): ProductViewPostRequestBody_params
    {
        return $this->getRequestBody()->getParams();
    }
}