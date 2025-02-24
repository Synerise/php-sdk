<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Events\AppearedInLocation\AppearedInLocationPostRequestBody;
use Synerise\Api\V4\Events\AppearedInLocation\AppearedInLocationPostRequestBody_params;
use Synerise\Api\V4\Models\Client;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\AppearedInLocationValidator;
use Synerise\Sdk\Api\Validation\Events\Validator;

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
     * AppearedInLocationPostRequestBody being built
     * @var AppearedInLocationPostRequestBody
     */
    protected AppearedInLocationPostRequestBody $requestBody;

    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider;
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new AppearedInLocationPostRequestBody();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new AppearedInLocationPostRequestBody_params());
    }

    /**
     * @inheritDoc
     * @return AppearedInLocationPostRequestBody
     */
    public function build(bool $validate = true): AppearedInLocationPostRequestBody
    {
        parent::setBaseProperties();

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return Validator
     */
    public static function getValidator(): AppearedInLocationValidator
    {
        return new AppearedInLocationValidator();
    }

    /**
     * @param float $latitude
     * @return $this
     */
    public function setLat(float $latitude): self
    {
        $this->getParams()->setLat($latitude);
        return $this;
    }

    /**
     * @param float $longitude
     * @return $this
     */
    public function setLon(float $longitude): self
    {
        $this->getParams()->setLon($longitude);
        return $this;
    }

    /**
     * @inheritDoc
     * @return AppearedInLocationPostRequestBody
     */
    protected function getRequestBody(): AppearedInLocationPostRequestBody
    {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return AppearedInLocationPostRequestBody_params
     */
    protected function getParams(): AppearedInLocationPostRequestBody_params
    {
        return $this->getRequestBody()->getParams();
    }
}