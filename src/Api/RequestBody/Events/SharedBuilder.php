<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Events\Shared\SharedPostRequestBody;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\SharedValidator;

class SharedBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'client.shared';

    /**
     * Default event labels
     */
    public const LABEL = 'Content shared';

    /**
     * SearchedPostRequestBody being built
     * @var SharedPostRequestBody
     */
    protected SharedPostRequestBody $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new SharedPostRequestBody();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return SharedPostRequestBody
     */
    public function build(bool $validate = true): SharedPostRequestBody
    {
        parent::setBaseProperties();

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return SharedValidator
     */
    public static function getValidator(): SharedValidator
    {
        return new SharedValidator();
    }

    /**
     * @inheritDoc
     * @return SharedPostRequestBody
     */
    protected function getRequestBody(): SharedPostRequestBody
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