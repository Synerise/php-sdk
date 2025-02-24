<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Enum;

class SortByMetric extends Enum {
    public const TRANSACTIONS_POPULARITY = "TransactionsPopularity";
    public const PAGE_VISITS_POPULARITY = "PageVisitsPopularity";
}
