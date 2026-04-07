<?php

declare(strict_types=1);

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
        ?ProfileMergeAction $profileMergeAction = null,
    ) {
        $this->uuidGenerator = $uuidGenerator;
        $this->profileManager = $profileManager;
        $this->profileMergeAction = $profileMergeAction;
    }

    /**
     * @throws NotFoundException
     * @return Client
     */
    public function getClient(): Client
    {
        $client = new Client();
        $client->setUuid($this->profileManager->getProfile()->getUuid());

        return $client;
    }

    /**
     * @throws NotFoundException
     * @return Profile
     */
    public function getProfile(): Profile
    {
        return $this->profileManager->getProfile();
    }

    /**
     * Verify if identity has changed. Reset uuid and merge profiles if necessary.
     * @param string $email Profile email
     * @throws RuntimeException|NotFoundException
     * @return void
     */
    public function identify(string $email)
    {
        $uuid = $this->uuidGenerator->uuid5($email);

        if ($this->isResetRequired($uuid)) {
            $previousUuid = $this->profileManager->getProfile()->getUuid();
            if ($this->profileMergeAction && $previousUuid && $this->isMergeRequired($email)) {
                $this->profileMergeAction->execute($email, $uuid, $previousUuid);
            }

            $this->profileManager->resetProfile($uuid);
        }
    }

    /**
     * Uuid reset is required if its value has changed
     * @param string $currentUuid
     * @throws NotFoundException
     * @return bool
     */
    protected function isResetRequired(string $currentUuid): bool
    {
        return $currentUuid !== $this->profileManager->getProfile()->getUuid();
    }

    /**
     * Merge required if profile is anonymous or email didn't change
     * @param string $email
     * @throws NotFoundException
     * @return bool
     */
    protected function isMergeRequired(string $email): bool
    {
        $baseParams = $this->profileManager->getProfile()->getBaseParams();
        if (!$baseParams) {
            return true;
        }
        $identityHash = $baseParams->getIdentityHash();
        return !$identityHash || $identityHash === (string) HashString::hashString($email);
    }
}
