<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Enum;

class QueryRuleFilters_textFilters_mode extends Enum {
    public const INCLUDE = "include";
    public const EXCLUDE = "exclude";
}
