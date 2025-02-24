<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Enum;

class PaginationMeta_link_rel extends Enum {
    public const FIRST = "first";
    public const NEXT = "next";
    public const PREV = "prev";
    public const LAST = "last";
}
