<?php

namespace Synerise\Sdk\Api\RequestBody\Events\Push;

use Synerise\Api\V4\Events\Push\Cancelled\CancelledPostRequestBody;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Sdk\RequestBody\Events\AbstractBaseBuilder;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\Push\CancelledValidator;

class CancelledBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'push.cancel';

    /**
     * Default event labels
     */
    public const LABEL = 'Push notifications cancelled';

    /**
     * SearchedPostRequestBody being built
     * @var CancelledPostRequestBody
     */
    protected CancelledPostRequestBody $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new CancelledPostRequestBody();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new DefaultParamSource());
    }

    /**
     * @inheritDoc
     * @return CancelledPostRequestBody
     */
    public function build(bool $validate = true): CancelledPostRequestBody
    {
        parent::setBaseProperties();

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return CancelledValidator
     */
    public static function getValidator(): CancelledValidator
    {
        return new CancelledValidator();
    }

    /**
     * @inheritDoc
     * @return CancelledPostRequestBody
     */
    protected function getRequestBody(): CancelledPostRequestBody
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