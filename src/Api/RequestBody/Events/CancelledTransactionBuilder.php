<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Events\CancelledTransaction\CancelledTransactionPostRequestBody;
use Synerise\Api\V4\Events\CancelledTransaction\CancelledTransactionPostRequestBody_params;
use Synerise\Api\V4\Models\Client;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\AddedToFavoritesValidator;

class CancelledTransactionBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'transaction.cancel';

    /**
     * Default event labels
     */
    public const LABEL = 'Transaction cancelled';

    /**
     * CancelledTransactionPostRequestBody being built
     * @var CancelledTransactionPostRequestBody
     */
    protected CancelledTransactionPostRequestBody $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new CancelledTransactionPostRequestBody();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new CancelledTransactionPostRequestBody_params());
    }

    /**
     * @inheritDoc
     * @return CancelledTransactionPostRequestBody
     */
    public function build(bool $validate = true): CancelledTransactionPostRequestBody
    {
        parent::setBaseProperties();

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
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
     * Set order id.
     * Required.
     * @param string $orderId
     * @return $this
     */
    public function setOrderId(string $orderId): self
    {
        $this->getParams()->setOrderId($orderId);
        return $this;
    }

    /**
     * @inheritDoc
     * @return CancelledTransactionPostRequestBody
     */
    protected function getRequestBody(): CancelledTransactionPostRequestBody
    {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return CancelledTransactionPostRequestBody_params
     */
    protected function getParams(): CancelledTransactionPostRequestBody_params
    {
        return $this->getRequestBody()->getParams();
    }
}