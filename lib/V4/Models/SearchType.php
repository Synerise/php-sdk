<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Enum;

class SearchType extends Enum {
    public const FULL_TEXT_SEARCH = "full-text-search";
    public const AUTOCOMPLETE = "autocomplete";
}
