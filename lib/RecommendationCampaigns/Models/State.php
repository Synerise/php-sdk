<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Enum;

class State extends Enum {
    public const DRAFT = "draft";
    public const ACTIVE = "active";
    public const PAUSED = "paused";
    public const DELETED = "deleted";
}
