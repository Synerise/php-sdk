<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Events\LoggedOut\LoggedOutPostRequestBody;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\LoggedOutValidator;

class LoggedOutBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'client.logout';

    /**
     * Default event label
     */
    public const LABEL = 'Profile logged out';

    /**
     *  LoggedOutPostRequestBody being built
     * @var LoggedOutPostRequestBody
     */
    protected LoggedOutPostRequestBody $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new LoggedOutPostRequestBody();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return LoggedOutPostRequestBody
     */
    public function build(bool $validate = true): LoggedOutPostRequestBody
    {
        parent::setBaseProperties();

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return LoggedOutValidator
     */
    public static function getValidator(): LoggedOutValidator
    {
        return new LoggedOutValidator();
    }

    /**
     * @inheritDoc
     * @return LoggedOutPostRequestBody
     */
    protected function getRequestBody(): LoggedOutPostRequestBody
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