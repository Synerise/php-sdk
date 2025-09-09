<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ABTestInfo_status extends Enum {
    public const NOT_STARTED = "NotStarted";
    public const RUNNING = "Running";
    public const PAUSED = "Paused";
    public const FINISHED = "Finished";
}
