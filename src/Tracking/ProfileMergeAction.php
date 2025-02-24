<?php

namespace Synerise\Sdk\Tracking;

interface ProfileMergeAction
{
    /**
     * Action to be performed when profiles require merging
     * @param string $email
     * @param string $uuid
     * @param string $previousUuid
     * @return mixed
     * @throws \InvalidArgumentException|\RuntimeException
     */
    public function execute(string $email, string $uuid, string $previousUuid);
}