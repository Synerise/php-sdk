<?php

namespace Synerise\Sdk\Model;

interface EnvironmentInterface extends Enum
{
    public const AZURE_VALUE = 'azure';

    public const GCP_VALUE = 'gcp';

    public const API_HOST = [
        self::AZURE_VALUE => 'https://api.synerise.com',
        self::GCP_VALUE => 'https://api.geb.synerise.com'
    ];

    public const TRACKER_HOST = [
        self::AZURE_VALUE => 'web.snrbox.com',
        self::GCP_VALUE => 'web.geb.snrbox.com'
    ];

    public const LABEL = [
        self::AZURE_VALUE => 'Microsoft Azure',
        self::GCP_VALUE => 'Google Cloud Platform'
    ];

    public function getApiHost(): string;

    public function getTrackerHost(): string;
}
