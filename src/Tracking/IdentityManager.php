<?php

namespace Synerise\Sdk\Tracking;

use RuntimeException;
use Synerise\Api\V4\Models\Client;
use Synerise\Sdk\Exception\NotFoundException;
use Synerise\Sdk\Helper\HashString;
use Synerise\Sdk\Helper\UuidGenerator;
use Synerise\Sdk\Model\Profile;

class IdentityManager
{
    /**
     * @var UuidGenerator
     */
    private UuidGenerator $uuidGenerator;

    /**
     * @var ProfileManager
     */
    private ProfileManager $profileManager;

    /**
     * @var ProfileMergeAction|null
     */
    private ?ProfileMergeAction $profileMergeAction;

    /**
     * @param ProfileManager $profileManager
     * @param UuidGenerator $uuidGenerator
     * @param ProfileMergeAction|null $profileMergeAction
     */
    public function __construct(
        ProfileManager $profileManager,
        UuidGenerator $uuidGenerator,
        ?ProfileMergeAction $profileMergeAction = null
    ) {
        $this->uuidGenerator = $uuidGenerator;
        $this->profileManager = $profileManager;
        $this->profileMergeAction = $profileMergeAction;
    }

    /**
     * @return Client
     * @throws NotFoundException
     */
    public function getClient(): Client
    {
        $client = new Client();
        $client->setUuid($this->profileManager->getProfile()->getUuid());

        return $client;
    }

    /**
     * @return Profile
     * @throws NotFoundException
     */
    public function getProfile(): Profile
    {
        return $this->profileManager->getProfile();
    }

    /**
     * Verify if identity has changed. Reset uuid and merge profiles if necessary.
     * @param string $email Profile email
     * @return void
     * @throws RuntimeException|NotFoundException
     */
    public function identify(string $email)
    {
        $profile = $this->profileManager->getProfile();
        $uuid = $this->uuidGenerator->uuid5($email);

        if ($this->isResetRequired($uuid)) {
            $previousUuid = $profile->getUuid();
            $this->profileManager->resetProfile($uuid);

            if ($this->isMergeRequired($email) && $this->profileMergeAction) {
                $this->profileMergeAction->execute($email, $uuid, $previousUuid);
            }
        }
    }

    /**
     * Uuid reset is required if its value has changed
     * @param string $currentUuid
     * @return bool
     * @throws NotFoundException
     */
    protected function isResetRequired(string $currentUuid): bool
    {
        return $currentUuid != $this->profileManager->getProfile()->getUuid();
    }

    /**
     * Merge required if profile is anonymous or email didn't change
     * @param string $email
     * @return bool
     * @throws NotFoundException
     */
    protected function isMergeRequired(string $email): bool
    {
        $identityHash = $this->profileManager->getProfile()->getBaseParams()->getIdentityHash();
        return !$identityHash || $identityHash == HashString::hashString($email);
    }
}