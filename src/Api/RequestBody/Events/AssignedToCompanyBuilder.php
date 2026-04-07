<?php

declare(strict_types=1);

namespace Synerise\Sdk\Api\RequestBody\Events;

use RuntimeException;
use Synerise\Api\V4\Events\AssignedToCompany\AssignedToCompanyPostRequestBody;
use Synerise\Api\V4\Events\AssignedToCompany\AssignedToCompanyPostRequestBody_params;
use Synerise\Api\V4\Models\Client;
use Synerise\Sdk\Api\Validation\Events\AssignedToCompanyValidator;
use Synerise\Sdk\Tracking\DefaultEventSourceProvider;
use Synerise\Sdk\Tracking\EventSourceProvider;

/**
 * @extends AbstractBaseBuilder<AssignedToCompanyPostRequestBody>
 */
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
    public function setCompanyId(float $companyId): static
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
        return $this->getRequestBody()->getParams() ?? throw new RuntimeException('Params not initialized');
    }
}
