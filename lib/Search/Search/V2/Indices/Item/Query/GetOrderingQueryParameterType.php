<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\Query;

use Microsoft\Kiota\Abstractions\Enum;

class GetOrderingQueryParameterType extends Enum {
    public const DESC = "desc";
    public const ASC = "asc";
}
