<?php

namespace Synerise\Sdk\Tracking;

use Exception;
use RuntimeException;
use Synerise\Sdk\Api\ClientBuilder;
use Synerise\Api\V4\Models\Profile;

class ProfileMergeDoRequest implements ProfileMergeAction
{
    /**
     * @var ClientBuilder
     */
    protected ClientBuilder $clientBuilder;

    /**
     * @param ClientBuilder $clientBuilder
     */
    public function __construct(
        ClientBuilder $clientBuilder
    ) {
        $this->clientBuilder = $clientBuilder;
    }

    /**
     * @inheritDoc
     */
    public function execute(string $email, string $uuid, string $previousUuid): void
    {
        $previousProfile = new Profile();
        $previousProfile->setUuid($previousUuid);
        $previousProfile->setEmail($email);

        $currentProfile = new Profile();
        $currentProfile->setUuid($uuid);
        $currentProfile->setEmail($email);

        try {
            $this->clientBuilder->v4()->clients()->batch()->post([
                $previousProfile,
                $currentProfile
            ]);
        } catch (Exception $e) {
            throw new RuntimeException('There was a problem with merge request', 0, $e);
        }
    }
}