<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Enum;

class ItemsSource_type extends Enum {
    public const AGGREGATE = "aggregate";
    public const EXPRESSION = "expression";
}
