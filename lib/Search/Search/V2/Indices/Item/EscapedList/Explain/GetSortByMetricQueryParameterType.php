<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\EscapedList\Explain;

use Microsoft\Kiota\Abstractions\Enum;

class GetSortByMetricQueryParameterType extends Enum {
    public const TRANSACTIONS_POPULARITY = "TransactionsPopularity";
    public const PAGE_VISITS_POPULARITY = "PageVisitsPopularity";
}
