<?php

namespace Synerise\Sdk\Model;

trait EnvironmentTrait
{
    public function getApiHost(): string
    {
        return self::API_HOST[$this->value()];
    }

    public function getTrackerHost(): string
    {
        return self::TRACKER_HOST[$this->value()];
    }
}
