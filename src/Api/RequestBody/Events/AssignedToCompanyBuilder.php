<?php

namespace Synerise\Sdk\Api\RequestBody\Events;

use Synerise\Api\V4\Events\AssignedToCompany\AssignedToCompanyPostRequestBody;
use Synerise\Api\V4\Events\AssignedToCompany\AssignedToCompanyPostRequestBody_params;
use Synerise\Api\V4\Models\Client;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;
use Synerise\Sdk\Api\Validation\Events\AssignedToCompanyValidator;

class AssignedToCompanyBuilder extends AbstractBaseBuilder
{
    /**
     * Event action
     */
    public const ACTION = 'client.assignToCompany';

    /**
     * Default event label
     */
    public const LABEL = 'Profile assigned to company';

    /**
     * AssignedToCompanyPostRequestBody being built
     * @var AssignedToCompanyPostRequestBody
     */
    protected AssignedToCompanyPostRequestBody $requestBody;

    /**
     * @param Client $client
     * @param EventSourceProvider|null $sourceProvider
     */
    protected function __construct(Client $client, ?EventSourceProvider $sourceProvider = null)
    {
        $this->sourceProvider = $sourceProvider ?: new DefaultEventSourceProvider();
        $this->action = self::ACTION;
        $this->label = self::LABEL;

        $this->requestBody = new AssignedToCompanyPostRequestBody();
        $this->requestBody->setClient($client);
        $this->requestBody->setParams(new AssignedToCompanyPostRequestBody_params());
    }

    /**
     * @inheritDoc
     * @return AssignedToCompanyPostRequestBody
     */
    public function build(bool $validate = true): AssignedToCompanyPostRequestBody
    {
        parent::setBaseProperties();

        if ($validate) {
            self::getValidator()::validate($this->requestBody);
        }

        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return AssignedToCompanyValidator
     */
    public static function getValidator(): AssignedToCompanyValidator
    {
        return new AssignedToCompanyValidator();
    }

    /**
     * Set company ID
     * @param float $companyId
     * @return $this
     */
    public function setCompanyId(float $companyId): self
    {
        $this->getParams()->setCompanyId($companyId);
        return $this;
    }

    /**
     * @inheritDoc
     * @return AssignedToCompanyPostRequestBody
     */
    protected function getRequestBody(): AssignedToCompanyPostRequestBody
    {
        return $this->requestBody;
    }

    /**
     * @inheritDoc
     * @return AssignedToCompanyPostRequestBody_params
     */
    protected function getParams(): AssignedToCompanyPostRequestBody_params
    {
        return $this->getRequestBody()->getParams();
    }
}