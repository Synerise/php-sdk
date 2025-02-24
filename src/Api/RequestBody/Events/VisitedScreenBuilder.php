<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Events\VisitedScreen\VisitedScreenPostRequestBody;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\VisitedScreenValidator;

class VisitedScreenBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'screen.view';

    /**
     * Default event labels
     */
    public const LABEL = 'Mobile app screen visited';

    /**
     * VisitedScreenPostRequestBody being built
     * @var VisitedScreenPostRequestBody
     */
    protected VisitedScreenPostRequestBody $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new VisitedScreenPostRequestBody();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return VisitedScreenPostRequestBody
     */
    public function build(bool $validate = true): VisitedScreenPostRequestBody
    {
        parent::setBaseProperties();

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return VisitedScreenValidator
     */
    public static function getValidator(): VisitedScreenValidator
    {
        return new VisitedScreenValidator();
    }

    /**
     * @inheritDoc
     * @return VisitedScreenPostRequestBody
     */
    protected function getRequestBody(): VisitedScreenPostRequestBody
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