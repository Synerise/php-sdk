<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use InvalidArgumentException;
use Synerise\Api\V4\Events\Custom\CustomPostRequestBody;
use Synerise\Api\V4\Models\Client;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\CustomValidator;
use Synerise\Sdk\Api\Validation\Events\EventBaseValidator;

class CustomBuilder extends AbstractBaseBuilder
{
    protected CustomPostRequestBody $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();

        $this->requestBody = new CustomPostRequestBody();
        $this->requestBody->setClient($client);
    }

    /**
     * @inheritDoc
     * @return CustomPostRequestBody
     */
    public function build(bool $validate = true): CustomPostRequestBody
    {
        if (!$this->action) {
            throw new InvalidArgumentException('Action must be defined for custom event');
        }

        parent::setBaseProperties();
        $this->requestBody->setAction($this->action);

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return CustomValidator
     */
    public static function getValidator(): CustomValidator
    {
        return new CustomValidator();
    }

    /**
     * Set action.
     * Required. Suggested format: <string>.<string>
     * @param string $action
     * @return self
     */
    public function setAction(string $action): self
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @inheritDoc
     * @return CustomPostRequestBody
     */
    protected function getRequestBody(): CustomPostRequestBody {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return DefaultParamSource
     */
    protected function getParams(): DefaultParamSource
    {
        if (!$this->getRequestBody()->getParams()) {
            $this->getRequestBody()->setParams(new DefaultParamSource());
        }
        return $this->getRequestBody()->getParams();
    }
}