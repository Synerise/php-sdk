<?php

declare(strict_types=1);

namespace Synerise\Sdk\Tracking;

use InvalidArgumentException;
use RuntimeException;
use Synerise\Sdk\Exception\NotFoundException;
use Synerise\Sdk\Model\Profile;

interface ProfileManager
{
    /**
     * Get tracking Profile object
     * @return Profile
     * @throws RuntimeException|NotFoundException
     *
     */
    public function getProfile(): Profile;

    /**
     * Reset uuid value
     * @param string $uuid
     * @param string|null $emailHash
     * @return void
     * @throws RuntimeException|InvalidArgumentException|NotFoundException
     */
    public function resetProfile(string $uuid, ?string $emailHash = null);
}
