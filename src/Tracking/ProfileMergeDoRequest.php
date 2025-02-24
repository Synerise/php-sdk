<?php

namespace Synerise\Sdk\Tracking;

use Exception;
use RuntimeException;
use Synerise\Sdk\Api\ClientBuilder;
use Synerise\Api\V4\Clients\Batch\Batch;

class ProfileMergeDoRequest implements ProfileMergeAction
{
    /**
     * @var ClientBuilder
     */
    protected ClientBuilder $apiClientFactory;

    /**
     * @param ClientBuilder $clientBuilder
     */
    public function __construct(
        ClientBuilder $clientBuilder
    ) {
        $this->apiClientFactory = $clientBuilder;
    }

    /**
     * @inheritDoc
     */
    public function execute(string $email, string $uuid, string $previousUuid): void
    {
        $previousProfile = new Batch();
        $previousProfile->setUuid($previousUuid);
        $previousProfile->setEmail($email);

        $currentProfile = new Batch();
        $currentProfile->setUuid($uuid);
        $currentProfile->setEmail($email);

        try {
            $this->apiClientFactory->v4()->clients()->batch()->post([
                $previousProfile,
                $currentProfile
            ]);
        } catch (Exception $e) {
            throw new RuntimeException('There was a problem with merge request', 0, $e);
        }
    }
}