<?php

declare(strict_types=1);

namespace Synerise\Sdk\Tracking;

use InvalidArgumentException;
use RuntimeException;

interface ProfileMergeAction
{
    /**
     * Action to be performed when profiles require merging
     * @param string $email
     * @param string $uuid
     * @param string $previousUuid
     * @throws InvalidArgumentException|RuntimeException
     * @return mixed
     */
    public function execute(string $email, string $uuid, string $previousUuid);
}
