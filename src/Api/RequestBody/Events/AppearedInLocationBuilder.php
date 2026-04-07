<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\RequestBody\Events;

use RuntimeException;
use Synerise\Api\V4\Models\AppearedInLocationEvent;
use Synerise\Api\V4\Models\AppearedInLocationEventParams;
use Synerise\Api\V4\Models\Client;
use Synerise\Sdk\Api\Validation\Events\AppearedInLocationValidator;
use Synerise\Sdk\Tracking\EventSourceProvider;

/**
 * @extends AbstractBaseBuilder<AppearedInLocationEvent>
 */
class AppearedInLocationBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'client.location';

    /**
     * Default event label
     */
    public const LABEL = 'Profile logged location';

    /**
     * AppearedInLocationEvent being built
     * @var AppearedInLocationEvent
     */
    protected AppearedInLocationEvent $requestBody;

    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider;
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new AppearedInLocationEvent();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new AppearedInLocationEventParams());
    }

    /**
     * @inheritDoc
     */
    public static function getValidator(): AppearedInLocationValidator
    {
        return new AppearedInLocationValidator();
    }

    /**
     * @param float $latitude
     * @return $this
     */
    public function setLat(float $latitude): static
    {
        $this->getParams()->setLat($latitude);
        return $this;
    }

    /**
     * @param float $longitude
     * @return $this
     */
    public function setLon(float $longitude): static
    {
        $this->getParams()->setLon($longitude);
        return $this;
    }

    /**
     * @inheritDoc
     * @return AppearedInLocationEvent
     */
    protected function getRequestBody(): AppearedInLocationEvent
    {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return AppearedInLocationEventParams
     */
    protected function getParams(): AppearedInLocationEventParams
    {
        return $this->getRequestBody()->getParams() ?? throw new RuntimeException('Params not initialized');
    }
}
