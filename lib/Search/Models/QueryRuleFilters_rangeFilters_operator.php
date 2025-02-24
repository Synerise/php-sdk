<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Enum;

class QueryRuleFilters_rangeFilters_operator extends Enum {
    public const GT = "gt";
    public const GTE = "gte";
    public const LT = "lt";
    public const LTE = "lte";
    public const EQ = "eq";
    public const NEQ = "neq";
}
