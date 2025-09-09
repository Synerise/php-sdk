<?php

namespace Synerise\Api\Recommendations\Models;

use Microsoft\Kiota\Abstractions\Enum;

class RecommendationRequestItemsSourceType extends Enum {
    public const AGGREGATE = "aggregate";
    public const EXPRESSION = "expression";
}
