<?php

namespace Synerise\Api\SearchConfig\Search\V2\SuggestionIndices;

use Microsoft\Kiota\Abstractions\Enum;

class GetOrderingQueryParameterType extends Enum {
    public const DESC = "desc";
    public const ASC = "asc";
}
