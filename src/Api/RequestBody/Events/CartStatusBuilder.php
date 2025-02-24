<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Events\Custom\CustomPostRequestBody;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\Product;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\CartStatusValidator;

class CartStatusBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'cart.status';

    /**
     * Default event label
     */
    public const LABEL = 'Cart contents changed';

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
     * Set products
     * @param Product[] $products
     * @return $this
     */
    public function setProducts(array $products): self
    {
        $this->additionalData['products'] = $products;
        return $this;
    }

    /**
     * Set total amount
     * @param float $amount
     * @return $this
     */
    public function setTotalAmount(float $amount): self
    {
        $this->additionalData['total_amount'] = $amount;
        return $this;
    }

    /**
     * Set total quantity
     * @param float $quantity
     * @return $this
     */
    public function setTotalQuantity(float $quantity): self
    {
        $this->additionalData['total_quantity'] = $quantity;
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