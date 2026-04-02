<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Models\CancelledTransactionEvent;
use Synerise\Api\V4\Models\CancelledTransactionEventParams;
use Synerise\Api\V4\Models\Client;
use Synerise\Sdk\Api\Validation\Events\AddedToFavoritesValidator;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;

/**
 * @extends AbstractBaseBuilder<CancelledTransactionEvent>
 */
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
     * CancelledTransactionEvent being built
     * @var CancelledTransactionEvent
     */
    protected CancelledTransactionEvent $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new CancelledTransactionEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new CancelledTransactionEventParams());
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
     * @return CancelledTransactionEvent
     */
    protected function getRequestBody(): CancelledTransactionEvent
    {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return CancelledTransactionEventParams
     */
    protected function getParams(): CancelledTransactionEventParams
    {
        return $this->getRequestBody()->getParams();
    }
}
