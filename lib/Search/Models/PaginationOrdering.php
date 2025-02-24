<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Enum;

class PaginationOrdering extends Enum {
    public const DESC = "desc";
    public const ASC = "asc";
}
