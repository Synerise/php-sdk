<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Enum;

class IncludeFacets extends Enum {
    public const ALL = "all";
    public const FILTERED = "filtered";
    public const UNFILTERED = "unfiltered";
    public const NONE = "none";
}
