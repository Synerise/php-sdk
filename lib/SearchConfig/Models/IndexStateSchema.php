<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Enum;

class IndexStateSchema extends Enum {
    public const NOT_READY = "NotReady";
    public const READY_UP_TO_DATE = "ReadyUpToDate";
    public const READY_NOT_UP_TO_DATE = "ReadyNotUpToDate";
}
