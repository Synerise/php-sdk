<?php

namespace Synerise\Api\Recommendations\Recommendations\V2\Recommend\Campaigns\Item;

use Microsoft\Kiota\Abstractions\Enum;

class GetItemsSourceTypeQueryParameterType extends Enum {
    public const AGGREGATE = "aggregate";
    public const EXPRESSION = "expression";
}
