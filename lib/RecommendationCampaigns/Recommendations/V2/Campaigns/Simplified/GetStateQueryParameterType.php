<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Simplified;

use Microsoft\Kiota\Abstractions\Enum;

class GetStateQueryParameterType extends Enum {
    public const DRAFT = "draft";
    public const ACTIVE = "active";
    public const PAUSED = "paused";
}
