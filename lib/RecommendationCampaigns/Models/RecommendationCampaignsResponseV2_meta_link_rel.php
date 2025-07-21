<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Enum;

class RecommendationCampaignsResponseV2_meta_link_rel extends Enum {
    public const FIRST = "first";
    public const NEXT = "next";
    public const PREV = "prev";
    public const LAST = "last";
}
