<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\Query;

use Microsoft\Kiota\Abstractions\Enum;

class GetIncludeFacetsQueryParameterType extends Enum {
    public const ALL = "all";
    public const FILTERED = "filtered";
    public const UNFILTERED = "unfiltered";
    public const NONE = "none";
}
